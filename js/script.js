document.addEventListener("DOMContentLoaded", function () {
    const statusLinks = document.querySelectorAll("a.status-link");

    statusLinks.forEach(link => {
        link.addEventListener("mouseenter", () => {
            link.style.transform = "scale(1.05)";
            link.style.transition = "transform 0.2s";
        });

        link.addEventListener("mouseleave", () => {
            link.style.transform = "scale(1)";
        });
    });
});
