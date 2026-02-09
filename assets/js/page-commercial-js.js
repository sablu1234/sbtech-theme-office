// Sell page form popup js
(function () {
    const openBtn = document.getElementById('commercialOpenModal');
    const modal = document.getElementById('commercialModal');

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
        if (el && el.getAttribute && el.getAttribute('data-commercial-close') === '1') closeModal();
    });

    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('is-open')) return;
        if (e.key === 'Escape') closeModal();
    });
})();