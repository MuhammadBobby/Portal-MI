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
};
