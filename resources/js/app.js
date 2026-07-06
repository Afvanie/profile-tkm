document.addEventListener("DOMContentLoaded", () => {

    console.log("JS NAVBAR AKTIF");

    const navbar = document.getElementById("navbar");
    const mobileButton = document.getElementById("mobileButton");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeMenu = document.getElementById("closeMenu");

    // SCROLL EFFECT
    window.addEventListener("scroll", () => {

        if (window.scrollY > 50) {
            navbar.classList.add("bg-white", "shadow", "text-black");
            navbar.classList.remove("text-white");
        } else {
            navbar.classList.remove("bg-white", "shadow", "text-black");
            navbar.classList.add("text-white");
        }

    });

    // OPEN MENU
    if (mobileButton && mobileMenu) {
        mobileButton.addEventListener("click", () => {
            mobileMenu.style.right = "0";
        });
    }

    // CLOSE MENU
    if (closeMenu && mobileMenu) {
        closeMenu.addEventListener("click", () => {
            mobileMenu.style.right = "-100%";
        });
    }

});