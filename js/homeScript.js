let slideIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlides() {
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
    }
    
    slideIndex++;
    
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    
    slides[slideIndex].classList.add('active');
}

setInterval(showSlides, 3000); // Change slide every 3 seconds (3000 milliseconds)
