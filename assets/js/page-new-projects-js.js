// Office for sate start section js for navigation
const track = document.getElementById("npTrack");
const prev = document.getElementById("npPrev");
const next = document.getElementById("npNext");

let index = 0;

function update() {
    const card = track.querySelector(".np-card");
    const gap = 16;
    const width = card.offsetWidth + gap;
    track.style.transform = `translateX(${-index * width}px)`;
}

next.onclick = () => {
    const cards = track.children.length;
    if (index < cards - 1) index++;
    update();
};
prev.onclick = () => {
    if (index > 0) index--;
    update();
};

window.addEventListener("resize", update);
update();