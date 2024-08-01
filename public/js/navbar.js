// Mendapatkan semua elemen nav item
const navItems = document.querySelectorAll("#nav .nav-item");
const navbar = document.getElementById("navbar");
const navbarSticky = document.getElementById("navbar-sticky");
const collapseToggle = document.querySelector(
    "[data-collapse-toggle='navbar-sticky']"
);

// Fungsi untuk menutup navbar sticky pada mobile
function closeNavbarSticky() {
    navbarSticky.classList.add("hidden");
    collapseToggle.setAttribute("aria-expanded", "false");
}

navItems.forEach((navItem) => {
    navItem.addEventListener("click", function () {
        // Menghapus class aktif dari semua nav item
        navItems.forEach((item) => {
            item.classList.remove(
                "text-white",
                "bg-teal-500",
                "md:bg-transparent",
                "md:text-teal-500"
            );
            item.classList.add(
                "text-gray-900",
                "bg-transparent",
                "md:text-gray-900",
                "md:bg-transparent"
            );
        });

        // Menambahkan class aktif ke nav item yang diklik
        this.classList.remove(
            "text-gray-900",
            "bg-transparent",
            "md:text-gray-900",
            "md:bg-transparent"
        );
        this.classList.add(
            "text-white",
            "bg-teal-500",
            "md:bg-transparent",
            "md:text-teal-500"
        );
    });
});

// Fungsi untuk menangani scroll event
function handleScroll() {
    if (window.scrollY > 0) {
        navbar.classList.remove(
            "md:bg-transparent",
            "md:backdrop-blur-0",
            "md:border-0",
            "md:shadow-none"
        );
    } else {
        navbar.classList.add(
            "md:bg-transparent",
            "md:backdrop-blur-0",
            "md:border-0",
            "md:shadow-none"
        );
    }
}

// Menambahkan event listener untuk scroll event
window.addEventListener("scroll", handleScroll);

// Memastikan navbar dalam keadaan awal yang benar
handleScroll();

// Menangani klik tombol collapse
collapseToggle.addEventListener("click", function () {
    const isHidden = navbarSticky.classList.contains("hidden");
    if (isHidden) {
        navbarSticky.classList.remove("hidden");
        collapseToggle.setAttribute("aria-expanded", "true");
    } else {
        closeNavbarSticky();
    }
});

// Menutup navbar sticky ketika area di luar navbar di-klik
document.addEventListener("click", function (event) {
    const isClickInsideNavbar = navbar.contains(event.target);
    const isClickInsideCollapseToggle = collapseToggle.contains(event.target);

    if (
        !isClickInsideNavbar &&
        !isClickInsideCollapseToggle &&
        window.innerWidth < 768
    ) {
        closeNavbarSticky();
    }
});
