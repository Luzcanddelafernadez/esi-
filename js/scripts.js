document.addEventListener("DOMContentLoaded", function() {
    const title = document.querySelector(".title");
    setTimeout(() => {
        title.style.animation = "slideIn 2s forwards";
    }, 1000); // Aparece después de 1 segundo
});