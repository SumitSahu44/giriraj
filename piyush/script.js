document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".hero-slide");
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            if (i === index) {
                slide.classList.add("active");
            }
        });
    }

    function startSlideshow() {
        showSlide(currentSlide);
        currentSlide = (currentSlide + 1) % slides.length;
        setTimeout(startSlideshow, 8000); // Change every 8 seconds
    }

    if (slides.length > 0) {
        showSlide(currentSlide); // Show first slide
        setTimeout(startSlideshow, 8000); // Start loop
    }
});
