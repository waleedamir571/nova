(function () {
  'use strict';

  var sliders = document.querySelectorAll('.nbs-scroll-slider');
  if (!sliders.length) return;

  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  sliders.forEach(function (slider) {
    var stage = slider.querySelector('.nbs-stage');
    var slides = Array.prototype.slice.call(slider.querySelectorAll('.nbs-slide'));
    var content = slider.querySelector('.nbs-content');
    var title = slider.querySelector('.nbs-title');
    var description = slider.querySelector('.nbs-description');
    var buyButton = slider.querySelector('.nbs-button');
    var current = slider.querySelector('.nbs-current');
    var total = slider.querySelector('.nbs-total');
    var progress = slider.querySelector('.nbs-progress');
    var progressFill = slider.querySelector('.nbs-track i');
    var activeIndex = 0;
    var wheelLocked = false;
    var contentTimer = 0;
    var releaseTimer = 0;

    if (!stage || !slides.length) return;

    slider.style.setProperty('--nbs-slides', slides.length);
    slider.style.height = (slides.length * 100) + (window.CSS && CSS.supports('height', '100svh') ? 'svh' : 'vh');
    total.textContent = String(slides.length).padStart(2, '0');

    function updateContent(slide, index) {
      window.clearTimeout(contentTimer);

      function writeContent() {
        title.textContent = slide.dataset.title || '';
        description.textContent = slide.dataset.description || '';
        buyButton.href = slide.dataset.buyUrl || 'books';
        current.textContent = String(index + 1).padStart(2, '0');
        progress.setAttribute('aria-label', 'Slide ' + (index + 1) + ' of ' + slides.length);
        progressFill.style.width = (((index + 1) / slides.length) * 100) + '%';
        content.classList.remove('is-changing');
      }

      if (reducedMotion || index === 0 && !content.dataset.ready) {
        writeContent();
      } else {
        content.classList.add('is-changing');
        contentTimer = window.setTimeout(writeContent, 220);
      }
      content.dataset.ready = 'true';
    }

    function showSlide(index, direction) {
      index = Math.max(0, Math.min(index, slides.length - 1));
      if (index === activeIndex && content.dataset.ready) return;

      slides.forEach(function (slide, slideIndex) {
        slide.classList.remove('is-active', 'is-leaving-up', 'is-leaving-down');
        slide.setAttribute('aria-hidden', slideIndex === index ? 'false' : 'true');
      });

      var previous = slides[activeIndex];
      if (previous && index !== activeIndex) {
        previous.classList.add(direction > 0 ? 'is-leaving-up' : 'is-leaving-down');
      }
      slides[index].classList.add('is-active');
      activeIndex = index;
      updateContent(slides[index], index);
    }

    function sectionStart() {
      return window.scrollY + slider.getBoundingClientRect().top;
    }

    function goTo(index) {
      var destination = sectionStart() + (index * window.innerHeight);
      showSlide(index, index > activeIndex ? 1 : -1);
      wheelLocked = true;
      window.scrollTo({ top: destination, behavior: reducedMotion ? 'auto' : 'smooth' });
      window.clearTimeout(releaseTimer);
      releaseTimer = window.setTimeout(function () {
        wheelLocked = false;
        syncToScroll();
      }, reducedMotion ? 80 : 760);
    }

    function stageIsPinned() {
      var rect = slider.getBoundingClientRect();
      return rect.top <= 1 && rect.bottom >= window.innerHeight - 1;
    }

    stage.addEventListener('wheel', function (event) {
      if (!stageIsPinned() || Math.abs(event.deltaY) < Math.abs(event.deltaX)) return;

      var direction = event.deltaY > 0 ? 1 : -1;
      var nextIndex = activeIndex + direction;
      var canChangeSlide = nextIndex >= 0 && nextIndex < slides.length;

      if (wheelLocked) {
        event.preventDefault();
        return;
      }
      if (!canChangeSlide) return;

      event.preventDefault();
      goTo(nextIndex);
    }, { passive: false });

    stage.addEventListener('keydown', function (event) {
      var direction = 0;
      if (event.key === 'ArrowDown' || event.key === 'PageDown') direction = 1;
      if (event.key === 'ArrowUp' || event.key === 'PageUp') direction = -1;
      if (!direction) return;

      var nextIndex = activeIndex + direction;
      if (nextIndex < 0 || nextIndex >= slides.length) return;
      event.preventDefault();
      goTo(nextIndex);
    });

    document.querySelectorAll('[data-book-index][href="#books"]').forEach(function (link) {
      link.addEventListener('click', function (event) {
        var index = Number.parseInt(link.dataset.bookIndex, 10);
        if (!Number.isInteger(index) || index < 0 || index >= slides.length) return;
        event.preventDefault();
        event.stopImmediatePropagation();
        goTo(index);
      });
    });

    function syncToScroll() {
      var distance = window.scrollY - sectionStart();
      var index = Math.round(distance / Math.max(window.innerHeight, 1));
      index = Math.max(0, Math.min(index, slides.length - 1));
      showSlide(index, index >= activeIndex ? 1 : -1);
    }

    var ticking = false;
    window.addEventListener('scroll', function () {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(function () {
        if (!wheelLocked) syncToScroll();
        ticking = false;
      });
    }, { passive: true });

    showSlide(0, 1);
    syncToScroll();
  });
})();
