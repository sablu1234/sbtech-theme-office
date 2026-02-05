
(function () {
    const openBtn = document.getElementById('sellOpenModal');
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

// Reach More Buyers popup

document.getElementById("warch_video").addEventListener("click", function (e) {
    e.preventDefault();

    const popup = document.getElementById("hello_popup");
    popup.classList.add("show");

    // auto hide after 2.5s
    setTimeout(() => {
        popup.classList.remove("show");
    }, 250000);
});

// click outside to close
document.getElementById("hello_popup").addEventListener("click", function (e) {
    if (e.target.id === "hello_popup") {
        this.classList.remove("show");
    }
});

