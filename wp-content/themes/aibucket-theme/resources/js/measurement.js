/**
 * Measurement events (GA4): affiliate_click, newsletter_signup_attempt,
 * newsletter_confirmed.
 *
 * Sends through window.gtag when present, else window.dataLayer (GTM).
 * When neither exists it does nothing. Never calls preventDefault.
 */
const SOURCE_KEY = 'aibucket_signup_source';

function send(name, raw) {
	const params = {};
	Object.keys(raw).forEach((key) => {
		if (raw[key] !== undefined && raw[key] !== '') {
			params[key] = raw[key];
		}
	});
	if (typeof window.gtag === 'function') {
		window.gtag('event', name, Object.assign({ transport_type: 'beacon' }, params));
		return true;
	}
	if (Array.isArray(window.dataLayer)) {
		window.dataLayer.push(Object.assign({ event: name }, params));
		return true;
	}
	return false;
}

function int(value) {
	const n = parseInt(value, 10);
	return Number.isNaN(n) ? undefined : n;
}

function storageGet() {
	try {
		return JSON.parse(window.localStorage.getItem(SOURCE_KEY) || 'null');
	} catch (e) {
		return null;
	}
}

function storageSet(value) {
	try {
		if (value === null) {
			window.localStorage.removeItem(SOURCE_KEY);
		} else {
			window.localStorage.setItem(SOURCE_KEY, JSON.stringify(value));
		}
	} catch (e) {
		// Storage blocked: the confirmation event falls back to source "unknown".
	}
}

// One click handler; middle-click (auxclick, button 1) also opens the offer.
function onCtaClick(event) {
	if (event.type === 'auxclick' && event.button !== 1) {
		return;
	}
	const link = event.target instanceof Element ? event.target.closest('a[data-aibucket-cta]') : null;
	if (!link) {
		return;
	}
	const d = link.dataset;
	let domain;
	try {
		domain = new URL(link.href).hostname;
	} catch (e) {
		domain = undefined;
	}
	send('affiliate_click', {
		tool_id: int(d.toolId),
		tool_name: d.toolName,
		content_id: int(d.contentId),
		content_type: d.contentType,
		cta_position: d.ctaPosition,
		link_type: d.linkType,
		link_domain: domain,
	});
}

function onSubmit(event) {
	const form = event.target;
	if (!(form instanceof HTMLFormElement) || !form.hasAttribute('data-aibucket-signup-source')) {
		return;
	}
	const source = {
		signup_source: form.getAttribute('data-aibucket-signup-source'),
		content_id: int(form.getAttribute('data-content-id')),
	};
	storageSet(source);
	send('newsletter_signup_attempt', source);
}

let confirmSent = false;

// Returns true once the event has been handed to gtag/dataLayer.
function confirmed() {
	if (confirmSent) {
		return true;
	}
	const el = document.querySelector('[data-aibucket-event="newsletter_confirmed"]');
	if (!el) {
		return true;
	}
	const stored = storageGet() || {};
	const sent = send('newsletter_confirmed', {
		signup_source: stored.signup_source || 'unknown',
		signup_content_id: stored.content_id,
		content_id: int(el.getAttribute('data-content-id')),
	});
	if (!sent) {
		// No tag yet: keep the stored source and the URL so a later try (or a reload) can still count it.
		return false;
	}
	confirmSent = true;
	storageSet(null);
	// Drop ?subscribed=1 so a reload does not count the confirmation twice.
	try {
		const url = new URL(window.location.href);
		url.searchParams.delete('subscribed');
		window.history.replaceState(window.history.state, '', url.toString());
	} catch (e) {
		// Older browser: a reload may re-send; acceptable.
	}
	return true;
}

// Try at DOM ready; if the analytics tag loads late, retry on window load and once 3s after.
function scheduleConfirmed() {
	if (confirmed()) {
		return;
	}
	window.addEventListener('load', () => {
		if (!confirmed()) {
			window.setTimeout(confirmed, 3000);
		}
	});
}

export function initMeasurement() {
	if (window.__aibucketMeasurement) {
		return;
	}
	window.__aibucketMeasurement = true;

	document.addEventListener('click', onCtaClick, true);
	document.addEventListener('auxclick', onCtaClick, true);
	// Capture phase so ConvertKit's own submit handler cannot hide the event.
	document.addEventListener('submit', onSubmit, true);

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', scheduleConfirmed);
	} else {
		scheduleConfirmed();
	}
}
