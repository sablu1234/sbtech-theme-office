const burger = document.getElementById('burger');
const menu = document.getElementById('menu');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('menuClose');
const langBtn = document.getElementById('langBtn');
const langDd = document.getElementById('langDd');

function closeMenu() {
    menu.classList.remove('active');
    overlay.classList.remove('active');
}

burger.onclick = () => {
    menu.classList.add('active');
    overlay.classList.add('active');
};

closeBtn.onclick = closeMenu;
overlay.onclick = closeMenu;

langBtn.onclick = (e) => {
    e.stopPropagation();
    langDd.classList.toggle('active');
};

document.addEventListener('click', () => {
    langDd.classList.remove('active');
});

document.querySelectorAll('.sub-toggle').forEach(link => {
    link.onclick = (e) => {
        if (window.innerWidth <= 992) {
            e.preventDefault();
            link.parentElement.classList.toggle('open');
        }
    }
});
