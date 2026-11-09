/**
 * Everafter Studio - Main Theme JavaScript
 * Vanilla JavaScript implementation adhering to WordPress standards.
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    initHeaderScroll();
    initMobileNav();
    initPortfolioFilter();
    initLightbox();
    initTestimonialsCarousel();
    initInquiryForm();
    initScrollReveal();
  });

  /**
   * 1. Header Transparent-to-Scrolled Behavior
   */
  function initHeaderScroll() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    const onScroll = function () {
      if (window.scrollY > 40) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /**
   * 2. Mobile Navigation Toggle
   */
  function initMobileNav() {
    const toggleBtn = document.querySelector('.mobile-nav-toggle');
    const nav = document.querySelector('.main-navigation');
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = nav.classList.toggle('is-open');
      toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close when clicking nav links
    const navLinks = nav.querySelectorAll('a');
    navLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        if (nav.classList.contains('is-open')) {
          nav.classList.remove('is-open');
          toggleBtn.setAttribute('aria-expanded', 'false');
          document.body.style.overflow = '';
        }
      });
    });

    // Close when pressing Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        nav.classList.remove('is-open');
        toggleBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  /**
   * 3. Portfolio Category Filtering
   */
  function initPortfolioFilter() {
    const filterBtns = document.querySelectorAll('.portfolio-filter .filter-btn');
    const cards = document.querySelectorAll('.portfolio-grid .portfolio-card');
    if (!filterBtns.length || !cards.length) return;

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const category = this.getAttribute('data-filter');

        filterBtns.forEach(function (b) { b.classList.remove('active'); });
        this.classList.add('active');

        cards.forEach(function (card) {
          const cardCats = (card.getAttribute('data-category') || '').split(' ');
          if (category === 'all' || cardCats.includes(category)) {
            card.style.display = 'block';
            setTimeout(function () {
              card.style.opacity = '1';
              card.style.transform = 'scale(1)';
            }, 50);
          } else {
            card.style.opacity = '0';
            card.style.transform = 'scale(0.96)';
            setTimeout(function () {
              card.style.display = 'none';
            }, 300);
          }
        });
      });
    });
  }

  /**
   * 4. Fullscreen Luxury Lightbox with Navigation
   */
  function initLightbox() {
    let lightbox = document.querySelector('.luxury-lightbox');
    if (!lightbox) {
      lightbox = document.createElement('div');
      lightbox.className = 'luxury-lightbox';
      lightbox.innerHTML =
        '<button class="lightbox-close" aria-label="Close Lightbox">&times;</button>' +
        '<button class="lightbox-prev" aria-label="Previous Image">&#10094;</button>' +
        '<div class="lightbox-content">' +
        '  <img src="" alt="" id="lightbox-img">' +
        '  <div class="lightbox-caption" id="lightbox-caption"></div>' +
        '</div>' +
        '<button class="lightbox-next" aria-label="Next Image">&#10095;</button>';
      document.body.appendChild(lightbox);
    }

    const items = document.querySelectorAll('[data-lightbox="true"]');
    if (!items.length) return;

    let currentIndex = 0;
    const galleryItems = [];

    items.forEach(function (el, index) {
      const src = el.getAttribute('data-full-img') || el.querySelector('img')?.src;
      const title = el.getAttribute('data-title') || el.querySelector('img')?.alt || '';
      galleryItems.push({ src: src, title: title });

      el.addEventListener('click', function (e) {
        e.preventDefault();
        openLightbox(index);
      });
    });

    const imgEl = document.getElementById('lightbox-img');
    const captionEl = document.getElementById('lightbox-caption');
    const closeBtn = lightbox.querySelector('.lightbox-close');
    const prevBtn = lightbox.querySelector('.lightbox-prev');
    const nextBtn = lightbox.querySelector('.lightbox-next');

    function openLightbox(index) {
      currentIndex = index;
      showImage(currentIndex);
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
      lightbox.classList.remove('active');
      document.body.style.overflow = '';
    }

    function showImage(index) {
      if (!galleryItems[index]) return;
      imgEl.src = galleryItems[index].src;
      imgEl.alt = galleryItems[index].title;
      captionEl.textContent = galleryItems[index].title;
    }

    function showNext() {
      currentIndex = (currentIndex + 1) % galleryItems.length;
      showImage(currentIndex);
    }

    function showPrev() {
      currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
      showImage(currentIndex);
    }

    closeBtn.addEventListener('click', closeLightbox);
    nextBtn.addEventListener('click', showNext);
    prevBtn.addEventListener('click', showPrev);

    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox) {
        closeLightbox();
      }
    });

    document.addEventListener('keydown', function (e) {
      if (!lightbox.classList.contains('active')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'ArrowLeft') showPrev();
    });
  }

  /**
   * 5. Testimonials Carousel
   */
  function initTestimonialsCarousel() {
    const items = document.querySelectorAll('.testimonial-item');
    if (!items.length) return;

    let current = 0;
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');

    function setSlide(index) {
      items.forEach(function (item, idx) {
        if (idx === index) {
          item.classList.add('active');
        } else {
          item.classList.remove('active');
        }
      });
      current = index;
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function () {
        const next = (current + 1) % items.length;
        setSlide(next);
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function () {
        const prev = (current - 1 + items.length) % items.length;
        setSlide(prev);
      });
    }

    // Auto rotate every 6 seconds unless user prefers reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!prefersReducedMotion && items.length > 1) {
      let interval = setInterval(function () {
        const next = (current + 1) % items.length;
        setSlide(next);
      }, 6500);

      const track = document.querySelector('.testimonial-track');
      if (track) {
        track.addEventListener('mouseenter', function () { clearInterval(interval); });
        track.addEventListener('mouseleave', function () {
          interval = setInterval(function () {
            const next = (current + 1) % items.length;
            setSlide(next);
          }, 6500);
        });
      }
    }
  }

  /**
   * 6. Contact & Inquiry AJAX Form
   */
  function initInquiryForm() {
    const form = document.getElementById('everafter-inquiry-form');
    if (!form) return;

    const feedback = document.getElementById('form-feedback');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.setAttribute('data-original-text', submitBtn.innerHTML);
        submitBtn.innerHTML = 'Sending Inquiry...';
      }

      if (feedback) {
        feedback.className = 'form-feedback';
        feedback.style.display = 'none';
        feedback.innerHTML = '';
      }

      const formData = new FormData(form);
      formData.append('action', 'everafter_submit_inquiry');

      // Check if WordPress localized parameters exist
      const ajaxUrl = (typeof everafter_params !== 'undefined' && everafter_params.ajax_url)
        ? everafter_params.ajax_url
        : (window.location.origin + '/wp-admin/admin-ajax.php');

      fetch(ajaxUrl, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = submitBtn.getAttribute('data-original-text') || 'Send Inquiry';
          }

          if (feedback) {
            feedback.style.display = 'block';
            if (data.success) {
              feedback.classList.add('success');
              feedback.innerHTML = data.data.message || 'Thank you. Your wedding inquiry has been received. Our team will contact you within 24 hours.';
              form.reset();
            } else {
              feedback.classList.add('error');
              feedback.innerHTML = (data.data && data.data.message) ? data.data.message : 'An error occurred while submitting your inquiry. Please try again.';
            }
          }
        })
        .catch(function (err) {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = submitBtn.getAttribute('data-original-text') || 'Send Inquiry';
          }
          if (feedback) {
            feedback.style.display = 'block';
            feedback.classList.add('error');
            feedback.innerHTML = 'Network or server error encountered. If this is a local preview, please note that live WordPress inquiry delivery connects via wp-admin/admin-ajax.php.';
          }
        });
    });
  }

  /**
   * 7. Subtle Scroll Reveal Animations
   */
  function initScrollReveal() {
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });

      document.querySelectorAll('.animate-on-scroll').forEach(function (el) {
        observer.observe(el);
      });
    }
  }

})();
