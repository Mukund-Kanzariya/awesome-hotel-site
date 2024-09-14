
// this sctipts ensure that which page is active

document.addEventListener("DOMContentLoaded", function () {
    // Extract the current page path (relative to the root of the site)
    const currentPath = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll(".navbar ul li a");

    navLinks.forEach(link => {
        // Extract the file name from the href attribute
        const linkPath = link.getAttribute('href').split('/').pop();
        if (linkPath === currentPath) {
            link.parentElement.classList.add("active");
        }
    });
});



// when page is scrolled 

window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    if (window.pageYOffset > 0) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }


    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) { // Adjust the scroll value as needed
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

};