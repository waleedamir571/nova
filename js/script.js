(function ($) {
  'use strict';
  $(function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var $pageLoader = $('.page-loader');
    var loaderStartedAt = Date.now();
    var loaderDuration = 4000;
    var loaderVideo = $pageLoader.find('video').get(0);
    var hidePageLoader = function () {
      var remainingTime = Math.max(0, loaderDuration - (Date.now() - loaderStartedAt));
      window.setTimeout(function () {
        $pageLoader.addClass('is-hidden');
        $('body').removeClass('is-loading');
      }, remainingTime);
    };
    if ($pageLoader.length) {
      if (loaderVideo) {
        loaderVideo.muted = true;
        var loaderPlayback = loaderVideo.play();
        if (loaderPlayback && typeof loaderPlayback.catch === 'function') {
          loaderPlayback.catch(function () {});
        }
      }
      if (reduceMotion) hidePageLoader();
      else $(window).on('load', hidePageLoader);
    }
    function setAos(selector, animation, delay, anchor) {
      $(selector).each(function (index) {
        $(this).attr({'data-aos': animation, 'data-aos-delay': String((delay || 0) + index * 110)});
        if (anchor) $(this).attr('data-aos-anchor', anchor);
      });
    }
    if (!reduceMotion && window.AOS) {
      setAos('.feature:nth-child(-n+2)', 'fade-right'); setAos('.feature:nth-child(n+3)', 'fade-left');
      setAos('.author-copy', 'fade-right');
      setAos('.books-intro', 'fade-right');
      setAos('.series-cta h2, .series-cta p, .series-cta .ornament', 'fade-up'); setAos('.series-cta a', 'fade-up', 120);
      setAos('.trailer p', 'fade-up', 120);
      setAos('.reviews h2, .reviews .ornament', 'fade-up');
      setAos('.review-row > div:first-child', 'fade-right', 0, '#reviews'); setAos('.review-row > div:nth-child(2)', 'fade-up', 0, '#reviews'); setAos('.review-row > div:last-child', 'fade-left', 0, '#reviews');
      setAos('.newsletter .col-lg-6:first-child', 'fade-right', 0, '#newsletter'); setAos('.newsletter .col-lg-6:last-child', 'fade-left', 0, '#newsletter');
      AOS.init({duration: window.innerWidth < 768 ? 650 : 900, easing: 'ease-out-cubic', offset: window.innerWidth < 768 ? 45 : 90, once: true, mirror: false, anchorPlacement: 'top-bottom'});
    }

    var $hero = $('.hero');
    if ($hero.length && 'IntersectionObserver' in window) {
      new IntersectionObserver(function (entries) {
        $hero.toggleClass('hero-paused', !entries[0].isIntersecting);
      }, {threshold: 0.01}).observe($hero[0]);
    }
    if ($hero.length && window.matchMedia('(hover: hover) and (pointer: fine)').matches && !reduceMotion) {
      var frameId = 0;
      $hero.on('pointermove', function (event) {
        var hero = this;
        var rect = hero.getBoundingClientRect();
        var x = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
        var y = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        hero.classList.add('is-parallax-active');
        cancelAnimationFrame(frameId);
        frameId = requestAnimationFrame(function () {
          hero.querySelector('.hero-lightning').style.transform = 'translate3d(' + (x * 13).toFixed(2) + 'px,' + (y * 8).toFixed(2) + 'px,0)';
        });
      }).on('pointerleave', function () {
        var hero = this;
        hero.classList.remove('is-parallax-active');
        hero.querySelector('.hero-lightning').style.transform = 'translate3d(0,0,0)';
      });
    }
    $('a[href^="#"], [data-scroll]').on('click', function (event) {
      var selector = $(this).attr('href') || $(this).data('scroll'); if (!selector || selector === '#') return;
      var $target = $(selector); if (!$target.length) return; event.preventDefault();
      $('html, body').stop(true).animate({scrollTop: $target.offset().top - $('.site-header').outerHeight()}, 700);
      var nav = document.getElementById('mainNav'); if (nav && nav.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(nav).hide();
    });
    $('.newsletter form').on('submit', function (event) {event.preventDefault(); var email = $.trim($(this).find('input').val()); var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email); $('.form-message').text(valid ? 'Welcome to the Inner Circle.' : 'Please enter a valid email address.');});
    var $bookSlider = $('.nova-books-slider');
    if ($bookSlider.length) {
      var $bookSlides = $bookSlider.find('.book-slide');
      var bookSlideIndex = 0;
      var showBookSlide = function (index) {
        bookSlideIndex = index % $bookSlides.length;
        var $slide = $bookSlides.eq(bookSlideIndex);
        $bookSlides.removeClass('is-active').attr('aria-hidden', 'true');
        $slide.addClass('is-active').attr('aria-hidden', 'false');
        $bookSlider.find('.book-slider-title').text($slide.data('title'));
        $bookSlider.find('.book-slider-author').text($slide.data('author'));
        $bookSlider.find('.book-slider-current').text(String(bookSlideIndex + 1).padStart(2, '0'));
        $bookSlider.find('.book-slider-progress').attr('aria-label', 'Slide ' + (bookSlideIndex + 1) + ' of ' + $bookSlides.length);
        $bookSlider.find('.book-slider-track i').css('width', ((bookSlideIndex + 1) / $bookSlides.length * 100) + '%');
      };
      showBookSlide(0);
      $bookSlider.find('.book-slider-prev').on('click', function () { showBookSlide((bookSlideIndex - 1 + $bookSlides.length) % $bookSlides.length); });
      $bookSlider.find('.book-slider-next').on('click', function () { showBookSlide((bookSlideIndex + 1) % $bookSlides.length); });
      if ($bookSlides.length > 1) {
        setInterval(function () { showBookSlide(bookSlideIndex + 1); }, 2000);
      }
    }
    $(window).on('load', function () {if (window.AOS && !reduceMotion) AOS.refreshHard();}).on('scroll', function () {$('.site-header').toggleClass('scrolled', window.scrollY > 30);}).on('resize', function () {if (window.AOS && !reduceMotion) AOS.refresh();});
  });
})(jQuery);
