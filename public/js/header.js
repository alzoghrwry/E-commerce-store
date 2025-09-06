document.addEventListener("DOMContentLoaded", function () {
    var MenuItems = document.getElementById("MenuItems");
    if(MenuItems) MenuItems.style.maxHeight = "0px";

    window.menutoggle = function() {
        if(MenuItems.style.maxHeight === "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
});
const ProductImg = document.getElementById("ProductImg");
        if(ProductImg){
            const SmallImg = document.querySelectorAll(".small-img");
            SmallImg.forEach(img => {
                img.addEventListener('click', () => {
                    ProductImg.src = img.src;
                    ProductImg.classList.add('fade');
                    setTimeout(() => ProductImg.classList.remove('fade'), 300);
                });
            });
        }

        // Scroll reveal
        const revealElements = document.querySelectorAll('.col-4, .offer, .testimonial');
        window.addEventListener('scroll', () => {
            const triggerBottom = window.innerHeight * 0.85;
            revealElements.forEach(el => {
                const elTop = el.getBoundingClientRect().top;
                if(elTop < triggerBottom){
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                }
            });
        });
