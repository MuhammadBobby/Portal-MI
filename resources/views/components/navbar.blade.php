<nav id="navbar"
    class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 shadow-md bg-opacity-30 backdrop-blur-sm md:bg-transparent md:backdrop-blur-0 md:border-0 md:shadow-none">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-3 mx-auto md:px-8">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/logo/logoMI.png" class="h-10" alt="Logo Manajemen Informatika">
            <span class="self-center text-2xl font-bold text-primary whitespace-nowrap">Portal MI</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            @if (Auth::check())
                <x-modal_profile />
            @else
                <x-elements.button_shadow href="/login">Sign in</x-elements.button_shadow>
            @endif
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul id="nav"
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                <li>
                    <a href="/#"
                        class="block px-3 py-2 text-gray-900 bg-transparent rounded nav-item md:text-gray-900 md:bg-transparent hover:bg-primary hover:text-white md:hover:bg-transparent md:hover:text-primary md:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/#top"
                        class="block px-3 py-2 text-gray-900 bg-transparent rounded nav-item md:text-gray-900 md:bg-transparent hover:bg-primary hover:text-white md:hover:bg-transparent md:hover:text-primary md:p-0"
                        aria-current="page">Top News</a>
                </li>
                <li>
                    <a href="/#news"
                        class="block px-3 py-2 text-gray-900 bg-transparent rounded nav-item md:text-gray-900 md:bg-transparent hover:bg-primary hover:text-white md:hover:bg-transparent md:hover:text-primary md:p-0"
                        aria-current="page">News</a>
                </li>
                <li>
                    <a href="/#category"
                        class="block px-3 py-2 text-gray-900 bg-transparent rounded nav-item md:text-gray-900 md:bg-transparent hover:bg-primary hover:text-white md:hover:bg-transparent md:hover:text-primary md:p-0"
                        aria-current="page">Category</a>
                </li>
                <li>
                    <a href="/#contact"
                        class="block px-3 py-2 text-gray-900 bg-transparent rounded nav-item md:text-gray-900 md:bg-transparent hover:bg-primary hover:text-white md:hover:bg-transparent md:hover:text-primary md:p-0"
                        aria-current="page">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<script>
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
        const isClickInsideCollapseToggle = collapseToggle.contains(event.target);

        if (
            !isClickInsideNavbar &&
            !isClickInsideCollapseToggle &&
            window.innerWidth < 768
        ) {
            closeNavbarSticky();
        }
    });
</script>
