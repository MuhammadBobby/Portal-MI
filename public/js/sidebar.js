// Ambil semua link di sidebar
const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

// Fungsi untuk mengatur active state berdasarkan url saat ini
function setActiveMenu() {
    const currentPath = window.location.pathname;

    allSideMenu.forEach((item) => {
        const li = item.parentElement;
        const itemHref = item.getAttribute("href");

        // Cek apakah href dari item saat ini sama dengan current path
        if (itemHref === currentPath) {
            li.classList.add("active");
        } else {
            li.classList.remove("active");
        }
    });
}

// Fungsi untuk menyimpan active menu ke localStorage
function saveActiveMenuToLocalStorage(activePath) {
    localStorage.setItem("activeMenu", activePath);
}

// Ketika item diklik, simpan href ke localStorage
allSideMenu.forEach((item) => {
    const li = item.parentElement;

    item.addEventListener("click", function () {
        const itemHref = item.getAttribute("href");

        allSideMenu.forEach((i) => {
            i.parentElement.classList.remove("active");
        });

        li.classList.add("active");

        // Simpan state active ke localStorage
        saveActiveMenuToLocalStorage(itemHref);
    });
});

// Ketika halaman dimuat ulang, cek dan set active menu dari localStorage
document.addEventListener("DOMContentLoaded", function () {
    const savedActiveMenu = localStorage.getItem("activeMenu");

    if (savedActiveMenu) {
        // Tetapkan active state berdasarkan localStorage
        allSideMenu.forEach((item) => {
            const li = item.parentElement;

            if (item.getAttribute("href") === savedActiveMenu) {
                li.classList.add("active");
            } else {
                li.classList.remove("active");
            }
        });
    } else {
        // Atur active state berdasarkan url saat ini jika tidak ada di localStorage
        setActiveMenu();
    }
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
    sidebar.classList.toggle("hide");
});
