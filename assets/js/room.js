
//parallax text scolled effects  
document.addEventListener("scroll", function() {
    const parallaxSections = document.querySelectorAll(".parallax-split");

    parallaxSections.forEach(section => {
        const rect = section.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight && rect.bottom > 0;

        if (isInView) {
            section.classList.add("in-view");
        } else {
            section.classList.remove("in-view");
        }
    });
});
