(function ($) {
  'use strict';
  $(function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    function setAos(selector, animation, delay) {
      $(selector).each(function (index) {
        $(this).attr({'data-aos': animation, 'data-aos-delay': String((delay || 0) + index * 110)});
      });
    }
    if (!reduceMotion && window.AOS) {
      setAos('.feature:nth-child(-n+2)', 'fade-right'); setAos('.feature:nth-child(n+3)', 'fade-left');
      setAos('.author-copy', 'fade-right'); setAos('.author-art', 'fade-left', 120);
      setAos('.books-intro', 'fade-right'); setAos('.book-grid article', 'fade-left', 80);
      setAos('.series-cta h2, .series-cta p, .series-cta .ornament', 'fade-up'); setAos('.series-cta a', 'fade-up', 120);
      setAos('.trailer-play', 'zoom-in'); setAos('.trailer p', 'fade-up', 120);
      setAos('.reviews h2, .reviews .ornament', 'fade-up');
      setAos('.review-row > div:first-child', 'fade-right', 100); setAos('.review-row > div:nth-child(2)', 'fade-up', 160); setAos('.review-row > div:last-child', 'fade-left', 220);
      setAos('.newsletter .col-lg-6:first-child', 'fade-right'); setAos('.newsletter .col-lg-6:last-child', 'fade-left', 120);
      setAos('.footer-grid > div:first-child', 'fade-right'); setAos('.footer-grid > div:not(:first-child)', 'fade-left', 80); setAos('.copyright', 'fade-up');
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
    $('.trailer-play').on('click', function () {var playing = $(this).toggleClass('is-playing').hasClass('is-playing'); $(this).text(playing ? 'Ⅱ' : '▶').attr('aria-label', playing ? 'Pause trailer' : 'Play trailer');});
    $('.newsletter form').on('submit', function (event) {event.preventDefault(); var email = $.trim($(this).find('input').val()); var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email); $('.form-message').text(valid ? 'Welcome to the Inner Circle.' : 'Please enter a valid email address.');});
    $(window).on('scroll', function () {$('.site-header').toggleClass('scrolled', window.scrollY > 30);}).on('resize', function () {if (window.AOS && !reduceMotion) AOS.refresh();});
  });
})(jQuery);
