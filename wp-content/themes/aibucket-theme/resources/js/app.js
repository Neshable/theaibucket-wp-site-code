// Navigation toggle (legacy; Flowbite drives the current header nav).
window.addEventListener('load', function () {
      const main_navigation = document.querySelector('#primary-menu');
      const toggle = document.querySelector('#primary-menu-toggle');
      if (!main_navigation || !toggle) {
            return;
      }
      toggle.addEventListener('click', function (e) {
            e.preventDefault();
            main_navigation.classList.toggle('hidden');
      });
});
