/**
* Template Name: Restaurantly
* Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Safe element selector with null check
   */
  function safeQuery(selector) {
    const el = document.querySelector(selector);
    if (!el) {
      console.warn(`Element not found: ${selector}`);
    }
    return el;
  }

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = safeQuery('#header');
    
    if (!selectHeader || !selectBody) return;
    
    if (!selectHeader.classList.contains('scroll-up-sticky') && 
        !selectHeader.classList.contains('sticky-top') && 
        !selectHeader.classList.contains('fixed-top')) {
      return;
    }
    
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  /**
   * Mobile nav toggle
   */
  function setupMobileNav() {
    const mobileNavToggleBtn = safeQuery('.mobile-nav-toggle');
    const body = document.querySelector('body');

    if (!mobileNavToggleBtn || !body) return;

    function mobileNavToggle() {
      body.classList.toggle('mobile-nav-active');
      mobileNavToggleBtn.classList.toggle('bi-list');
      mobileNavToggleBtn.classList.toggle('bi-x');
    }

    mobileNavToggleBtn.addEventListener('click', mobileNavToggle);

    // Hide mobile nav on same-page/hash links
    const navLinks = document.querySelectorAll('#navmenu a');
    navLinks.forEach(navmenu => {
      navmenu.addEventListener('click', () => {
        if (body.classList.contains('mobile-nav-active')) {
          mobileNavToggle();
        }
      });
    });

    // Toggle mobile nav dropdowns
    document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
      navmenu.addEventListener('click', function(e) {
        e.preventDefault();
        this.parentNode.classList.toggle('active');
        this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
        e.stopImmediatePropagation();
      });
    });
  }

  /**
   * Preloader
   */
  function setupPreloader() {
    const preloader = safeQuery('#preloader');
    if (preloader) {
      window.addEventListener('load', () => {
        preloader.remove();
      });
    }
  }

  /**
   * Scroll top button
   */
  function setupScrollTop() {
    const scrollTop = safeQuery('.scroll-top');
    if (!scrollTop) return;

    function toggleScrollTop() {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }

    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);
  }

  /**
   * Animation on scroll function and init
   */
  function setupAOS() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    } else {
      console.warn('AOS library not loaded');
    }
  }

  /**
   * Initiate glightbox
   */
  function setupGLightbox() {
    if (typeof GLightbox !== 'undefined') {
      const glightbox = GLightbox({
        selector: '.glightbox'
      });
    } else {
      console.warn('GLightbox library not loaded');
    }
  }

  /**
   * Init isotope layout and filters
   */
  function setupIsotope() {
    if (typeof Isotope === 'undefined' || typeof imagesLoaded === 'undefined') {
      console.warn('Isotope or imagesLoaded not loaded');
      return;
    }

    document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
      let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
      let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
      let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

      let initIsotope;
      imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
        initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
          itemSelector: '.isotope-item',
          layoutMode: layout,
          filter: filter,
          sortBy: sort
        });
      });

      isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
        filters.addEventListener('click', function() {
          isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
          this.classList.add('filter-active');
          initIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          setupAOS();
        }, false);
      });
    });
  }

  /**
   * Init swiper sliders
   */
  function setupSwiper() {
    if (typeof Swiper === 'undefined') {
      console.warn('Swiper library not loaded');
      return;
    }

    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      const configElement = swiperElement.querySelector(".swiper-config");
      if (!configElement) return;

      try {
        let config = JSON.parse(configElement.innerHTML.trim());
        new Swiper(swiperElement, config);
      } catch (e) {
        console.error('Error parsing Swiper config:', e);
      }
    });
  }

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  function setupHashScrolling() {
    if (window.location.hash) {
      const section = safeQuery(window.location.hash);
      if (section) {
        setTimeout(() => {
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  }

  /**
   * Navmenu Scrollspy
   */
  function setupScrollspy() {
    const navmenulinks = document.querySelectorAll('.navmenu a');
    if (!navmenulinks.length) return;

    function navmenuScrollspy() {
      navmenulinks.forEach(navmenulink => {
        if (!navmenulink.hash) return;
        const section = safeQuery(navmenulink.hash);
        if (!section) return;
        
        const position = window.scrollY + 200;
        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
          navmenulink.classList.add('active');
        } else {
          navmenulink.classList.remove('active');
        }
      });
    }

    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);
  }

  /**
   * Initialize all components after DOM is loaded
   */
  document.addEventListener('DOMContentLoaded', function() {
    // Scroll effects
    document.addEventListener('scroll', toggleScrolled);
    window.addEventListener('load', toggleScrolled);

    // Setup components
    setupMobileNav();
    setupPreloader();
    setupScrollTop();
    setupAOS();
    setupGLightbox();
    setupIsotope();
    setupSwiper();
    setupHashScrolling();
    setupScrollspy();
  });

})();