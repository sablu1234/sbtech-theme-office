(function () {
    /* ========= Gallery ========= */
    const featured = document.getElementById('mpFeaturedImg');
    const counter = document.getElementById('mpCounter');
    const thumbs = Array.from(document.querySelectorAll('.mp-thumb[data-src]'));
    const navButtons = Array.from(document.querySelectorAll('[data-nav]'));
    const openLightboxBtn = document.getElementById('mpOpenLightbox');
    const lightbox = document.getElementById('mpLightbox');
    const lightboxImg = document.getElementById('mpLightboxImg');

    const images = thumbs.map(btn => ({
        src: btn.getAttribute('data-src'),
        alt: btn.getAttribute('data-alt') || 'Property image'
    }));

    let index = 0;

    function setActive(i, syncLightbox = true) {
        index = (i + images.length) % images.length;
        const item = images[index];
        featured.src = item.src;
        featured.alt = item.alt;

        thumbs.forEach((t, ti) => t.classList.toggle('is-active', ti === index));
        counter.textContent = `${index + 1} / ${images.length}`;

        if (syncLightbox && lightbox.classList.contains('is-open')) {
            lightboxImg.src = item.src;
            lightboxImg.alt = item.alt;
        }
    }
    function step(dir) { setActive(index + (dir === 'next' ? 1 : -1)); }

    thumbs.forEach((btn, i) => btn.addEventListener('click', () => setActive(i)));
    navButtons.forEach(b => b.addEventListener('click', () => step(b.getAttribute('data-nav'))));

    function openLightbox() {
        const item = images[index];
        lightboxImg.src = item.src;
        lightboxImg.alt = item.alt;
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    openLightboxBtn?.addEventListener('click', openLightbox);

    document.addEventListener('click', (e) => {
        const el = e.target;
        if (el && el.getAttribute && el.getAttribute('data-close') === '1') closeLightbox();
        if (el && el.getAttribute && el.getAttribute('data-nav')) {
            step(el.getAttribute('data-nav'));
        }
    });

    document.addEventListener('keydown', (e) => {
        const isOpen = lightbox.classList.contains('is-open');
        if (isOpen) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') step('next');
            if (e.key === 'ArrowLeft') step('prev');
        } else {
            if (e.key === 'ArrowRight') step('next');
            if (e.key === 'ArrowLeft') step('prev');
        }
    });

    setActive(0);

    /* ========= Mortgage Calculator (Dynamic) ========= */
    const loanEl = document.getElementById('mpLoan');
    const downEl = document.getElementById('mpDown');
    const yearsEl = document.getElementById('mpYears');
    const rateEl = document.getElementById('mpRate');
    const currencyEl = document.getElementById('mpCurrency');

    const monthlyEl = document.getElementById('mpMonthly');
    const totalLoanEl = document.getElementById('mpTotalLoan');
    const interestEl = document.getElementById('mpInterest');
    const periodEl = document.getElementById('mpPeriod');

    const sideFromEl = document.getElementById('mpSideFrom');
    const sideRateEl = document.getElementById('mpSideRate');

    function fmt(n) {
        return new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(n);
    }
    function clamp(v, min, max) {
        if (Number.isNaN(v)) return min;
        return Math.min(max, Math.max(min, v));
    }
    function monthlyPayment(loanAmount, annualRate, years) {
        if (loanAmount <= 0 || years <= 0) return 0;
        const n = years * 12;
        const r = (annualRate / 100) / 12;
        if (r === 0) return loanAmount / n;
        const pow = Math.pow(1 + r, n);
        return loanAmount * r * pow / (pow - 1);
    }

    function calc() {
        let price = parseFloat(loanEl.value || 0);
        let downPct = parseFloat(downEl.value || 0);
        let years = parseFloat(yearsEl.value || 0);
        let rate = parseFloat(rateEl.value || 0);
        const cur = currencyEl.value || 'AED';

        price = Math.max(0, price);
        downPct = clamp(downPct, 0, 95);
        years = clamp(years, 1, 40);
        rate = clamp(rate, 0, 25);

        const downAmount = price * (downPct / 100);
        const loanAmount = Math.max(0, price - downAmount);
        const monthly = monthlyPayment(loanAmount, rate, years);

        monthlyEl.textContent = `${fmt(monthly)} ${cur}`;
        totalLoanEl.textContent = `${fmt(loanAmount)} ${cur}`;
        interestEl.textContent = `${rate}%`;
        periodEl.textContent = `${years} years`;

        if (sideFromEl) sideFromEl.innerHTML = `${fmt(monthly)} ${cur} <span>/ month</span>`;
        if (sideRateEl) sideRateEl.textContent = `${rate}%`;
    }

    ['input', 'change'].forEach(evt => {
        loanEl.addEventListener(evt, calc);
        downEl.addEventListener(evt, calc);
        yearsEl.addEventListener(evt, calc);
        rateEl.addEventListener(evt, calc);
        currencyEl.addEventListener(evt, calc);
    });

    calc();
})();
