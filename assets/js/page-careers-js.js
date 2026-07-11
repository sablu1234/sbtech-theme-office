// hear from our team start ar js - smooth infinite version
(function () {
    const root = document.querySelector('[data-careers-slider]');
    if (!root) return;

    const track = root.querySelector('[data-careers-track]');
    const originalSlides = Array.from(track.querySelectorAll('.careers_testimonials__slide'));
    const prev = root.querySelector('[data-careers-prev]');
    const next = root.querySelector('[data-careers-next]');
    const dotsWrap = document.querySelector('[data-careers-dots]');

    if (!track || originalSlides.length === 0) return;

    let i = 1;
    let timer = null;

    // TIME 1:
    // Auto slide change time.
    // 3000ms = 3 seconds.
    // Increase this if you want the slide to stay longer.
    // Example: 5000 = 5 seconds.
    const interval = 2000;

    // TIME 2:
    // Slide movement animation speed.
    // 600ms = 0.6 seconds.
    // Increase this if you want slower/smoother movement.
    // Example: 1000 = 1 second.
    const transitionSpeed = 1000;

    // Clone first and last slide for smooth infinite loop
    const firstClone = originalSlides[0].cloneNode(true);
    const lastClone = originalSlides[originalSlides.length - 1].cloneNode(true);

    firstClone.classList.add('is-clone');
    lastClone.classList.add('is-clone');

    track.appendChild(firstClone);
    track.insertBefore(lastClone, originalSlides[0]);

    const slides = Array.from(track.querySelectorAll('.careers_testimonials__slide'));

    // First position setup without animation
    track.style.transition = 'none';
    track.style.transform = 'translateX(-100%)';

    // TIME 3:
    // Small delay before enabling animation again.
    // 50ms is only used so browser can apply the first transform properly.
    // Usually you do not need to change this.
    setTimeout(() => {
        track.style.transition = `transform ${transitionSpeed}ms ease`;
    }, 50);

    function buildDots() {
        if (!dotsWrap) return;

        dotsWrap.innerHTML = '';

        originalSlides.forEach((_, idx) => {
            const d = document.createElement('button');
            d.type = 'button';
            d.className = 'careers_testimonials__dot' + (idx === 0 ? ' is-active' : '');
            d.setAttribute('aria-label', 'Go to testimonial ' + (idx + 1));

            d.addEventListener('click', () => {
                i = idx + 1;
                update();
                restart();
            });

            dotsWrap.appendChild(d);
        });
    }

    function setActiveDot() {
        if (!dotsWrap) return;

        const dots = Array.from(dotsWrap.querySelectorAll('.careers_testimonials__dot'));

        let activeIndex = i - 1;

        if (i === 0) {
            activeIndex = originalSlides.length - 1;
        }

        if (i === slides.length - 1) {
            activeIndex = 0;
        }

        dots.forEach((d, idx) => {
            d.classList.toggle('is-active', idx === activeIndex);
        });
    }

    function update() {
        // This controls how fast the slide moves
        track.style.transition = `transform ${transitionSpeed}ms ease`;

        track.style.transform = 'translateX(' + (-i * 100) + '%)';
        setActiveDot();
    }

    function nextSlide() {
        if (i >= slides.length - 1) return;
        i++;
        update();
    }

    function prevSlide() {
        if (i <= 0) return;
        i--;
        update();
    }

    track.addEventListener('transitionend', () => {
        if (i === slides.length - 1) {
            track.style.transition = 'none';
            i = 1;
            track.style.transform = 'translateX(-100%)';

            // TIME 3 again:
            // Small reset delay after jumping from clone slide to real first slide
            setTimeout(() => {
                track.style.transition = `transform ${transitionSpeed}ms ease`;
            }, 50);
        }

        if (i === 0) {
            track.style.transition = 'none';
            i = originalSlides.length;
            track.style.transform = 'translateX(' + (-i * 100) + '%)';

            // TIME 3 again:
            // Small reset delay after jumping from clone slide to real last slide
            setTimeout(() => {
                track.style.transition = `transform ${transitionSpeed}ms ease`;
            }, 50);
        }

        setActiveDot();
    });

    function start() {
        stop();

        // TIME 1 is used here:
        // Every 3000ms / 3 seconds, nextSlide() will run automatically
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

    if (prev) {
        prev.addEventListener('click', () => {
            prevSlide();
            restart();
        });
    }

    if (next) {
        next.addEventListener('click', () => {
            nextSlide();
            restart();
        });
    }

    root.addEventListener('mouseenter', stop);
    root.addEventListener('mouseleave', start);

    let startX = 0;
    let dx = 0;

    root.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        dx = 0;
    }, { passive: true });

    root.addEventListener('touchmove', (e) => {
        dx = e.touches[0].clientX - startX;
    }, { passive: true });

    root.addEventListener('touchend', () => {
        if (Math.abs(dx) > 40) {
            if (dx < 0) {
                nextSlide();
            } else {
                prevSlide();
            }

            restart();
        }
    });

    buildDots();
    setActiveDot();
    start();
})();