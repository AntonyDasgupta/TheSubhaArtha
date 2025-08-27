// This file is ready for your custom JavaScript.
// You can add features like form validation, animations, or dynamic content loading here.

document.addEventListener('DOMContentLoaded', function() {
    console.log("MOM's School website is loaded and ready!");

    // Optional: Add a class to the navbar when the user scrolls down
    // This provides a subtle visual effect.
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                // You can define a 'scrolled' class in style.css for more effects
                navbar.style.backgroundColor = '#001a5e'; // Darker navy on scroll
            } else {
                // Revert to the original transparent-like background
                navbar.style.backgroundColor = 'rgba(1, 28, 100, 0.8)'; 
            }
        });
    }
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
