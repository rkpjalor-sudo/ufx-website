// UFX Website Script

console.log("UFX Website Loaded Successfully");

// Smooth button animation
document.querySelectorAll(".buttons a").forEach(button => {
    button.addEventListener("mouseenter", () => {
        button.style.opacity = "0.9";
    });

    button.addEventListener("mouseleave", () => {
        button.style.opacity = "1";
    });
});

// Welcome message
window.addEventListener("load", () => {
    setTimeout(() => {
        alert("Welcome to UFX Premium Panel!");
    }, 1000);
});