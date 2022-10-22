let modalButton = document.getElementById('link');
let closeModalButton = document.getElementById("closeModalButton");
let modal = document.getElementById("modal");
let overlay = document.getElementById('overlay');

modalButton.onclick = function () {
    modal.setAttribute("class", "modal_active");
    overlay.setAttribute("class", "overlay_active");
};

closeModalButton.onclick = function () {
    modal.removeAttribute("modal_active");
    overlay.removeAttribute("overlay_active");
    modal.setAttribute("class", "modal_hidden");
    overlay.setAttribute("class", "overlay_hidden");
}

window.onload = function () {
    window.setInterval(function () {
        let now = new Date();
        let clock = document.getElementById("clock");
        clock.innerHTML = now.toLocaleTimeString();
    }, 1000);
};

//123