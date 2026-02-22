// area single page form popup js
(function () {
    const openBtn = document.getElementById('areaOpenModal');
    const modal = document.getElementById('sellModal');

    function openModal() {
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        // focus first input
        const first = modal.querySelector('input, textarea, select, button');
        if (first) setTimeout(() => first.focus(), 50);
    }
    function closeModal() {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        openBtn.focus();
    }

    openBtn.addEventListener('click', openModal);

    modal.addEventListener('click', (e) => {
        const el = e.target;
        if (el && el.getAttribute && el.getAttribute('data-sell-close') === '1') closeModal();
    });

    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('is-open')) return;
        if (e.key === 'Escape') closeModal();
    });
})();

// area singe page slider js
(() => {
    const root = document.querySelector(".box-slider");
    if (!root) return;

    const track = root.querySelector(".box-slider__track");
    const slides = Array.from(root.querySelectorAll(".box-slide"));
    const prevBtn = root.querySelector(".box-prev");
    const nextBtn = root.querySelector(".box-next");
    const dotsWrap = root.querySelector(".box-dots");

    const autoplay = root.dataset.autoplay === "true";
    const interval = parseInt(root.dataset.interval || "3500", 10);

    let index = 0, timer = null, hover = false;

    // build dots
    slides.forEach((_, i) => {
        const b = document.createElement("button");
        b.type = "button";
        b.className = "box-dot" + (i === 0 ? " is-active" : "");
        b.setAttribute("aria-label", "Go to slide " + (i + 1));
        b.addEventListener("click", () => goTo(i, true));
        dotsWrap.appendChild(b);
    });

    const dots = Array.from(root.querySelectorAll(".box-dot"));
    const setDot = (i) => dots.forEach((d, di) => d.classList.toggle("is-active", di === i));

    function goTo(i, fromUser = false) {
        index = (i + slides.length) % slides.length;
        track.style.transform = `translateX(-${index * 100}%)`;
        setDot(index);
        if (fromUser) restart();
    }

    const next = () => goTo(index + 1);
    const prev = () => goTo(index - 1);

    prevBtn.addEventListener("click", () => { prev(); restart(); });
    nextBtn.addEventListener("click", () => { next(); restart(); });

    // hover pause
    root.addEventListener("mouseenter", () => { hover = true; stop(); });
    root.addEventListener("mouseleave", () => { hover = false; start(); });

    // touch swipe
    let sx = 0, dx = 0, dragging = false;
    root.addEventListener("touchstart", (e) => { dragging = true; sx = e.touches[0].clientX; dx = 0; stop(); }, { passive: true });
    root.addEventListener("touchmove", (e) => { if (!dragging) return; dx = e.touches[0].clientX - sx; }, { passive: true });
    root.addEventListener("touchend", () => {
        dragging = false;
        if (Math.abs(dx) > 50) { dx < 0 ? next() : prev(); restart(); }
        else start();
    });

    function start() {
        if (!autoplay || hover) return;
        stop();
        timer = setInterval(next, interval);
    }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    function restart() { stop(); start(); }

    goTo(0);
    start();

    document.addEventListener("visibilitychange", () => document.hidden ? stop() : start());
})();


// area slier js

alert("area slider js");