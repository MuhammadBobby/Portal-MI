<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-orange-50 font-urbanist">
    <x-navbar />
    <x-landingPage.jumbotron />
    <x-landingPage.top />
    <x-landingPage.parallax />
    <x-landingPage.news />

    <script src="/js/navbar.js"></script>
    {{-- <script>
        // Pastikan script dijalankan setelah DOM sepenuhnya dimuat
        document.addEventListener("DOMContentLoaded", function() {
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
                navItem.addEventListener("click", function() {
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
            collapseToggle.addEventListener("click", function() {
                const isHidden = navbarSticky.classList.contains("hidden");
                if (isHidden) {
                    navbarSticky.classList.remove("hidden");
                    collapseToggle.setAttribute("aria-expanded", "true");
                } else {
                    closeNavbarSticky();
                }
            });

            // Menutup navbar sticky ketika area di luar navbar di-klik
            document.addEventListener("click", function(event) {
                const isClickInsideNavbar = navbar.contains(event.target);
                const isClickInsideCollapseToggle = collapseToggle.contains(
                    event.target
                );

                if (
                    !isClickInsideNavbar &&
                    !isClickInsideCollapseToggle &&
                    window.innerWidth < 768
                ) {
                    closeNavbarSticky();
                }
            });
        });
    </script> --}}
    <script src="/js/script.js"></script>
</body>

</html>
