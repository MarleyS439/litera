var buttonAddProfile = document.getElementById("addProfile");
var modalAddProfile = document.getElementById("modalAddProfile");
var buttonCancelAddProfile = document.getElementById("cancelAddProfile");
var title = document.getElementById("h2");

// Abre o modal de adicionar o perfil
buttonAddProfile.addEventListener("click", function () {
    modalAddProfile.style.display = "block";
    buttonAddProfile.style.display = "none";
    title.style.display = "none";
});

// Fecha o modal de adicionar o perfil
buttonCancelAddProfile.addEventListener("click", function () {
    modalAddProfile.style.display = "none";
    buttonAddProfile.style.display = "inherit";
    title.style.display = "flex";
});