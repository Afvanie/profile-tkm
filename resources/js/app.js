import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 900,
    once: true,
    offset: 100,
    easing: 'ease-out-cubic',
});

document.addEventListener("DOMContentLoaded", () => {

    console.log("JS NAVBAR AKTIF");

    const navbar = document.getElementById("navbar");
    const mobileButton = document.getElementById("mobileButton");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeMenu = document.getElementById("closeMenu");

    // SCROLL EFFECT
    if (navbar) {
        window.addEventListener("scroll", () => {

            if (window.scrollY > 50) {
                navbar.classList.add("bg-white", "shadow", "text-black");
                navbar.classList.remove("text-white");
            } else {
                navbar.classList.remove("bg-white", "shadow", "text-black");
                navbar.classList.add("text-white");
            }

        });
    }

    // OPEN MOBILE MENU
    if (mobileButton && mobileMenu) {
        mobileButton.addEventListener("click", () => {
            console.log("HAMBURGER DIKLIK");

            mobileMenu.style.right = "0";
        });
    } else {
        console.log("mobileButton atau mobileMenu tidak ditemukan");
    }

    // CLOSE MOBILE MENU
    if (closeMenu && mobileMenu) {
        closeMenu.addEventListener("click", () => {
            mobileMenu.style.right = "-100%";
        });
    }

    // CLOSE MENU AFTER CLICK LINK
    if (mobileMenu) {
        const mobileLinks = document.querySelectorAll("#mobileMenu a");

        mobileLinks.forEach((link) => {
            link.addEventListener("click", () => {
                mobileMenu.style.right = "-100%";
            });
        });
    }

});