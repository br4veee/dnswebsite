let modalButton = document.getElementById('link');
let closeModalButton = document.getElementById("closeModalButton");
let modal = document.getElementById("modal");
let overlay = document.getElementById('overlay');

function closeModal() {
    modal.setAttribute("class", "modal_hidden");
    overlay.setAttribute("class", "overlay_hidden");
}

function openModal() {
    modal.setAttribute("class", "modal_active");
    overlay.setAttribute("class", "overlay_active");
}

modalButton.onclick = function () {
    openModal();
};

closeModalButton.onclick = function () {
    closeModal();
}

overlay.onclick = function () {
    closeModal();
}

window.onload = function () {
    window.setInterval(function () {
        let now = new Date();
        let clock = document.getElementById("clock");
        clock.innerHTML = now.toLocaleTimeString();
    }, 1000);
};