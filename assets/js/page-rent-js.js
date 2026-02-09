// Faq js animation
(function () {
    const wrap = document.getElementById("rentFaq");
    if (!wrap) return;

    const items = Array.from(wrap.querySelectorAll(".rent-faq"));

    function setHeights() {
        items.forEach((item) => {
            const ans = item.querySelector(".rent-faq__a");
            if (!ans) return;
            if (item.classList.contains("is-open")) {
                ans.style.maxHeight = ans.scrollHeight + "px";
            } else {
                ans.style.maxHeight = "0px";
            }
        });
    }

    function closeAll(except) {
        items.forEach((item) => {
            if (item === except) return;
            item.classList.remove("is-open");
            const btn = item.querySelector(".rent-faq__q");
            const ans = item.querySelector(".rent-faq__a");
            if (btn) btn.setAttribute("aria-expanded", "false");
            if (ans) ans.style.maxHeight = "0px";
        });
    }

    // init: open first (or any with data-open="true")
    let opened = items.find(i => i.getAttribute("data-open") === "true") || items[0];
    items.forEach((i) => i.classList.remove("is-open"));
    if (opened) {
        opened.classList.add("is-open");
        const btn = opened.querySelector(".rent-faq__q");
        if (btn) btn.setAttribute("aria-expanded", "true");
    }
    setHeights();

    wrap.addEventListener("click", (e) => {
        const btn = e.target.closest(".rent-faq__q");
        if (!btn) return;

        const item = btn.closest(".rent-faq");
        const ans = item.querySelector(".rent-faq__a");
        const isOpen = item.classList.contains("is-open");

        closeAll(item);

        if (!isOpen) {
            item.classList.add("is-open");
            btn.setAttribute("aria-expanded", "true");
            if (ans) ans.style.maxHeight = ans.scrollHeight + "px";
        } else {
            item.classList.remove("is-open");
            btn.setAttribute("aria-expanded", "false");
            if (ans) ans.style.maxHeight = "0px";
        }
    });

    window.addEventListener("resize", () => {
        // keep animation height correct on resize
        setHeights();
    });
})();