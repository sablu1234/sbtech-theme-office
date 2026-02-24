// REVIEW ABOUT JS
(() => {
    const viewport = document.getElementById('viewport');
    const track = document.getElementById('track');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (!viewport || !track) return;

    let timer = null;

    const step = () => {
        const card = track.querySelector('.review_card');
        if (!card) return 0;
        const gap = parseFloat(getComputedStyle(track).gap) || 18;
        return card.getBoundingClientRect().width + gap;
    };

    const maxScroll = () => viewport.scrollWidth - viewport.clientWidth;

    const next = () => {
        const s = step();
        if (!s) return;

        if (viewport.scrollLeft >= maxScroll() - 5) {
            viewport.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            viewport.scrollBy({ left: s, behavior: 'smooth' });
        }
    };

    const prev = () => {
        const s = step();
        if (!s) return;

        if (viewport.scrollLeft <= 5) {
            viewport.scrollTo({ left: maxScroll(), behavior: 'smooth' });
        } else {
            viewport.scrollBy({ left: -s, behavior: 'smooth' });
        }
    };

    const start = () => {
        stop();
        timer = setInterval(next, 2800);
    };

    const stop = () => {
        if (timer) clearInterval(timer);
        timer = null;
    };

    nextBtn.addEventListener('click', () => { stop(); next(); start(); });
    prevBtn.addEventListener('click', () => { stop(); prev(); start(); });

    viewport.addEventListener('mouseenter', stop);
    viewport.addEventListener('mouseleave', start);
    viewport.addEventListener('touchstart', stop, { passive: true });
    viewport.addEventListener('touchend', start);

    window.addEventListener('load', start);
})();
