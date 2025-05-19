document.addEventListener("DOMContentLoaded", () => {
    const filterButtons = document.querySelectorAll('.gallery-filter');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active', 'bg-primary', 'text-black'));
            // Add active class to clicked button
            button.classList.add('active', 'bg-primary', 'text-black');

            const category = button.textContent.trim();

            galleryItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');

                if (category === 'All' || itemCategory === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
