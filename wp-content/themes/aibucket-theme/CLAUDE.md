# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

**aibucket-theme** is a custom WordPress theme for "The AI Bucket" — a directory of AI tools and GitHub repositories. It is built on the [TailPress](https://tailpress.io) boilerplate, which combines WordPress with Tailwind CSS, PostCSS, and esbuild. [Flowbite](https://flowbite.com) is included as a Tailwind component library.

ACF (Advanced Custom Fields) is bundled as an MU-plugin inside `inc/mu-plugins/acf/` rather than installed as a standalone plugin.

## Build Commands

```bash
# Development build (unminified)
npm run dev

# Watch mode (rebuilds on change)
npm run watch

# Production build (minified)
npm run production
```

Source files live in `resources/` and compile to `css/` and `js/`:
- `resources/css/app.css` → `css/app.css`
- `resources/css/editor-style.css` → `css/editor-style.css`
- `resources/js/app.js` → `js/app.js`

The CSS entry point (`resources/css/app.css`) imports Tailwind layers and a `custom.css` partial.

## Architecture

### Custom Post Types
- **`tool`** (`inc/post-types/tool-post-type.php`) — AI tools, slug `/tools/`, taxonomy `tool_category`
- **`repo`** (`inc/post-types/repos-post-type.php`) — GitHub repositories, slug `/repositories/`

### Taxonomies
- **`tool_category`** (`inc/taxonomies/taxonomy-tool-tags.php`) — Categories for tools, slug `/tool-categories/`

### Key Classes
- **`Hmc_Templates`** (`inc/classes/class-hmc-templates.php`) — Static helper for loading template parts with variables (`Hmc_Templates::load($path, $args)`) and rendering paginated navigation (`Hmc_Templates::pagination()`).
- **`AiBucket_Alphabet_Filter`** (`inc/classes/class-alphabet-filter.php`) — Registers `letter` and `search_filter` query vars; adds a `posts_where` filter so the archive can filter tools by first letter of title.

### Template Hierarchy
- `archive-tool.php` — Tool listings with alphabet filter form
- `single-tool.php` — Individual tool pages with related tools section
- `archive-repo.php` / `single.php` / `page.php` — Other content
- `template-parts/content-tool.php` — Tool card (used in grids)
- `template-parts/content-single-tool.php` — Full tool detail view
- `template-parts/elements/` — Reusable partials (alphabet form, subscribe form, rating stars)
- `template-parts/pages/` — Full-page partials (dashboard, sites)

### Tailwind Configuration
- Breakpoints follow TailPress conventions: `xs:480px`, `sm:600px`, `md:782px`, `lg` and `xl` are derived from `theme.json` `contentSize`/`wideSize`.
- Colors and font sizes are sourced from `theme.json` via the `@jeffreyvr/tailwindcss-tailpress` plugin.
- `safelist.txt` prevents Tailwind from purging dynamically generated class names.
- Flowbite plugin is registered in `tailwind.config.js`.

### ACF Fields
Field group JSON files are stored in `acf-json/` for version control. The ACF library path is overridden in `inc/register-plugins.php` to load from `inc/mu-plugins/acf/`.

### Query Customization
`inc/query-modifier.php` hooks into `pre_get_posts` for front-end query modifications. The alphabet filter works through a separate `posts_where` filter in `AiBucket_Alphabet_Filter`.

### Asset Versioning
`functions.php:aibucket_theme_asset()` appends a cache-busting `?time=` query string in non-production environments. In production (`wp_get_environment_type() === 'production'`) assets are served with the theme version number only.
