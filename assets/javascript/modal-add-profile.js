var buttonAddProfile = document.getElementById("addProfile");
var modalAddProfile = document.getElementById("modalAddProfile");
var buttonCancelAddProfile = document.getElementById("cancelAddProfile");


// Abre o modal de adicionar o perfil
buttonAddProfile.addEventListener("click", function () {
    modalAddProfile.style.display = "block";;
});

// Fecha o modal de adicionar o perfil
buttonCancelAddProfile.addEventListener("click", function () {
    modalAddProfile.style.display = "none";
});

