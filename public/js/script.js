const scrollContainer = document.querySelector(".overflow-x-scroll");
const scrollLeftBtn = document.getElementById("scrollLeftBtn");
const scrollRightBtn = document.getElementById("scrollRightBtn");
const categoryLeftBtn = document.getElementById("categoryLeftBtn");
const categoryRightBtn = document.getElementById("categoryRightBtn");
const categoryContainer = document.getElementById("category-container");

// News samping
scrollLeftBtn.addEventListener("click", function () {
    scrollContainer.scrollBy({
        left: -200, // Jumlah scroll ke kiri (ubah sesuai kebutuhan)
        behavior: "smooth", // Animasi scroll
    });
});

scrollRightBtn.addEventListener("click", function () {
    scrollContainer.scrollBy({
        left: 200, // Jumlah scroll ke kanan (ubah sesuai kebutuhan)
        behavior: "smooth", // Animasi scroll
    });
});

// Category
categoryLeftBtn.addEventListener("click", function () {
    categoryContainer.scrollBy({
        left: -200, // Jumlah scroll ke kiri (ubah sesuai kebutuhan)
        behavior: "smooth", // Animasi scroll
    });
});

categoryRightBtn.addEventListener("click", function () {
    categoryContainer.scrollBy({
        left: 200, // Jumlah scroll ke kanan (ubah sesuai kebutuhan)
        behavior: "smooth", // Animasi scroll
    });
});
