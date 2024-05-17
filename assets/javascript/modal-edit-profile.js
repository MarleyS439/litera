var buttonEditProfile = document.querySelector(".editProfile")
var modalEditProfile = document.getElementById("modalEditProfile")
var buttonCancelEditProfile = document.getElementById("cancelEditProfile");



// Abre o modal de adicionar o perfil
buttonEditProfile.addEventListener("click", function () {
    modalEditProfile.style.display = "block";
    console.log("Funfo");
});

// Fecha o modal de adicionar o perfil
buttonCancelEditProfile.addEventListener("click", function () {
    modalEditProfile.style.display = "none";
})