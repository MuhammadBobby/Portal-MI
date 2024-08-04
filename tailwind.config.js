module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        colors: {
            primary: "#0d9488",
            secondary: "#bef264",
        },
        fontFamily: {
            urbanist: ["Urbanist", "sans-serif"],
        },
    },
    plugins: [require("flowbite/plugin")],
    safelist: [
        "text-[#004080]",
        "text-[#008000]",
        "text-[#FFD700]",
        "text-[#FFA500]",
        "text-[#800000]",
        "text-[#708090]",
        "text-[#800080]",
        "text-[#8B4513]",
        "bg-[#004080]",
        "bg-[#008000]",
        "bg-[#FFD700]",
        "bg-[#FFA500]",
        "bg-[#800000]",
        "bg-[#708090]",
        "bg-[#800080]",
        "bg-[#8B4513]",
    ],
};
