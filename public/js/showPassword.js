const togglePassword = document.getElementById("togglePassword");
const togglePasswordConfirmation = document.getElementById(
    "togglePasswordConfirmation"
);
const passwordField = document.getElementById("password");
const passwordConfirmationField = document.getElementById(
    "password_confirmation"
);

togglePassword.addEventListener("click", function () {
    // Toggle tipe input antara password dan text
    const type =
        passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);

    // Mengubah teks tombol berdasarkan status
    this.textContent = type === "password" ? "👁️" : "🙈";
});

togglePasswordConfirmation.addEventListener("click", function () {
    // Toggle tipe input antara password dan text
    const type =
        passwordConfirmationField.getAttribute("type") === "password"
            ? "text"
            : "password";
    passwordConfirmationField.setAttribute("type", type);

    // Mengubah teks tombol berdasarkan status
    this.textContent = type === "password" ? "👁️" : "🙈";
});
