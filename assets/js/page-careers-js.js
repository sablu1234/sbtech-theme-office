// Great Place To Work start ar js

(function () {
    const root = document.querySelector('[data-awards]');
    if (!root) return;

    const track = root.querySelector('[data-track]');
    const cards = Array.from(track.querySelectorAll('.awards__card'));
    const prevBtn = root.querySelector('[data-prev]');
    const nextBtn = root.querySelector('[data-next]');
    const dotsWrap = root.querySelector('[data-dots]');

    let index = 0;
    let perView = 1;
    let maxIndex = 0;

    function getGap() {
        const cs = window.getComputedStyle(track);
        const g = parseFloat(cs.gap || cs.columnGap || '14');
        return isNaN(g) ? 14 : g;
    }

    function calc() {
        const frame = root.querySelector('.awards__viewport');
        const frameW = frame.getBoundingClientRect().width;
        const cardW = cards[0].getBoundingClientRect().width;
        const gap = getGap();
        perView = Math.max(1, Math.floor((frameW + gap) / (cardW + gap)));
        maxIndex = Math.max(0, cards.length - perView);
        index = Math.min(index, maxIndex);
    }

    function buildDots() {
        dotsWrap.innerHTML = '';
        const dotsCount = maxIndex + 1; // pages
        for (let i = 0; i < dotsCount; i++) {
            const b = document.createElement('button');
            b.type = 'button';
            b.className = 'awards__dot' + (i === index ? ' is-active' : '');
            b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
            b.addEventListener('click', () => { index = i; update(); });
            dotsWrap.appendChild(b);
        }
    }

    function updateDots() {
        const dots = Array.from(dotsWrap.querySelectorAll('.awards__dot'));
        dots.forEach((d, i) => d.classList.toggle('is-active', i === index));
    }

    function update() {
        const cardW = cards[0].getBoundingClientRect().width;
        const gap = getGap();
        const x = (cardW + gap) * index;
        track.style.transform = 'translateX(' + (-x) + 'px)';

        // buttons
        if (prevBtn) prevBtn.disabled = (index <= 0);
        if (nextBtn) nextBtn.disabled = (index >= maxIndex);

        updateDots();
    }

    function init() {
        calc();
        buildDots();
        update();
    }

    prevBtn && prevBtn.addEventListener('click', () => {
        index = Math.max(0, index - 1);
        update();
    });
    nextBtn && nextBtn.addEventListener('click', () => {
        index = Math.min(maxIndex, index + 1);
        update();
    });

    window.addEventListener('resize', () => { init(); });

    // optional swipe (mobile)
    let startX = 0, dx = 0, isDown = false;
    const viewport = root.querySelector('.awards__viewport');

    viewport.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX; dx = 0;
    }, { passive: true });

    viewport.addEventListener('touchmove', (e) => {
        dx = e.touches[0].clientX - startX;
    }, { passive: true });

    viewport.addEventListener('touchend', () => {
        if (Math.abs(dx) > 40) {
            if (dx < 0) index = Math.min(maxIndex, index + 1);
            else index = Math.max(0, index - 1);
            update();
        }
    });

    init();
})();

// hear from our team start ar js
(function () {
    const root = document.querySelector('[data-careers-slider]');
    if (!root) return;

    const track = root.querySelector('[data-careers-track]');
    const slides = Array.from(track.querySelectorAll('.careers_testimonials__slide'));
    const prev = root.querySelector('[data-careers-prev]');
    const next = root.querySelector('[data-careers-next]');
    const dotsWrap = document.querySelector('[data-careers-dots]');

    let i = 0;
    let timer = null;
    const interval = 3000; // 1 second

    function buildDots() {
        dotsWrap.innerHTML = '';
        slides.forEach((_, idx) => {
            const d = document.createElement('button');
            d.type = 'button';
            d.className = 'careers_testimonials__dot' + (idx === i ? ' is-active' : '');
            d.setAttribute('aria-label', 'Go to testimonial ' + (idx + 1));
            d.addEventListener('click', () => { i = idx; update(true); });
            dotsWrap.appendChild(d);
        });
    }

    function setActiveDot() {
        const dots = Array.from(dotsWrap.querySelectorAll('.careers_testimonials__dot'));
        dots.forEach((d, idx) => d.classList.toggle('is-active', idx === i));
    }

    function update(resetTimer) {
        track.style.transform = 'translateX(' + (-i * 100) + '%)';
        setActiveDot();
        if (resetTimer) restart();
    }

    function nextSlide() {
        i = (i + 1) % slides.length;
        update(false);
    }

    function prevSlide() {
        i = (i - 1 + slides.length) % slides.length;
        update(false);
    }

    function start() {
        timer = setInterval(nextSlide, interval);
    }

    function stop() {
        if (timer) clearInterval(timer);
        timer = null;
    }

    function restart() {
        stop();
        start();
    }

    prev && prev.addEventListener('click', () => { prevSlide(); restart(); });
    next && next.addEventListener('click', () => { nextSlide(); restart(); });

    // pause on hover (desktop)
    root.addEventListener('mouseenter', stop);
    root.addEventListener('mouseleave', start);

    // swipe (mobile)
    let startX = 0, dx = 0;
    root.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; dx = 0; }, { passive: true });
    root.addEventListener('touchmove', (e) => { dx = e.touches[0].clientX - startX; }, { passive: true });
    root.addEventListener('touchend', () => {
        if (Math.abs(dx) > 40) {
            if (dx < 0) nextSlide();
            else prevSlide();
            restart();
        }
    });

    buildDots();
    update(false);
    start();
})();