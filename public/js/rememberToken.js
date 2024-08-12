function showTokenPopup(token) {
    Swal.fire({
        title: "Token Anda",
        text: `Klik tombol di bawah untuk menyalin token.`,
        icon: "info",
        html: `<input type="text" id="tokenField" value="${token}" readonly style="width: 100%; padding: 5px; "/>`,
        showCancelButton: true,
        confirmButtonText: "Salin Token",
        cancelButtonText: "Tutup",
    }).then((result) => {
        if (result.isConfirmed) {
            // Salin token ke clipboard
            const tokenField = document.getElementById("tokenField");
            tokenField.select();
            document.execCommand("copy");

            // Tampilkan notifikasi token berhasil disalin
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Token berhasil disalin ke clipboard.",
            });
        }
    });
}
