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

// Fungsi untuk menyimpan collapse state ke localStorage
function saveSidebarStateToLocalStorage(isCollapsed) {
    localStorage.setItem("sidebarCollapsed", isCollapsed ? "true" : "false");
}

// Fungsi untuk mengatur collapse state dari localStorage
function setSidebarCollapseFromLocalStorage() {
    const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true";

    if (isCollapsed) {
        sidebar.classList.add("hide");
    } else {
        sidebar.classList.remove("hide");
    }
}

// Ketika halaman dimuat ulang, set active menu dan sidebar collapse dari localStorage
document.addEventListener("DOMContentLoaded", function () {
    setActiveMenu();
    setSidebarCollapseFromLocalStorage();
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
    sidebar.classList.toggle("hide");

    // Simpan state sidebar (collapsed/expanded) ke localStorage
    const isCollapsed = sidebar.classList.contains("hide");
    saveSidebarStateToLocalStorage(isCollapsed);
});

// SEARCH
const searchButton = document.querySelector(
    "#content nav form .form-input button"
);
const searchButtonIcon = document.querySelector(
    "#content nav form .form-input button .bx"
);
const searchForm = document.querySelector("#content nav form");

searchButton.addEventListener("click", function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle("show");
        if (searchForm.classList.contains("show")) {
            searchButtonIcon.classList.replace("bx-search", "bx-x");
        } else {
            searchButtonIcon.classList.replace("bx-x", "bx-search");
        }
    }
});

if (window.innerWidth < 768) {
    sidebar.classList.add("hide");
} else if (window.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
    if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace("bx-x", "bx-search");
        searchForm.classList.remove("show");
    }
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
    if (this.checked) {
        document.body.classList.add("dark");
    } else {
        document.body.classList.remove("dark");
    }
});
