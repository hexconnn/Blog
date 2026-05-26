console.log(
"Sistem Informasi Bantuan Sosial Aktif"
);

window.addEventListener("scroll", function(){

    const navbar =
    document.querySelector(".navbar");

    navbar.classList.toggle(
        "shadow",
        window.scrollY > 50
    );

});

setTimeout(function(){

    alert(
    "Selamat datang di Sistem Informasi Manajemen Distribusi Bantuan Sosial"
    );

}, 1000);