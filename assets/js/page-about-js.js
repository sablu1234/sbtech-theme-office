// our achivements js
(function () {
    const track = document.querySelector('[data-ach-track]');
    const prev = document.querySelector('[data-ach-prev]');
    const next = document.querySelector('[data-ach-next]');
    if (!track || !prev || !next) return;

    const getStep = () => {
        const card = track.querySelector('.about_ach_card');
        if (!card) return 320;
        const style = getComputedStyle(track);
        const gap = parseFloat(style.columnGap || style.gap || 16) || 16;
        return card.getBoundingClientRect().width + gap;
    };

    prev.addEventListener('click', () => {
        track.scrollBy({ left: -getStep(), behavior: 'smooth' });
    });

    next.addEventListener('click', () => {
        track.scrollBy({ left: getStep(), behavior: 'smooth' });
    });
})();