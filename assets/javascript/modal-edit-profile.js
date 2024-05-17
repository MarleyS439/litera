var buttonEditProfile = document.querySelector(".editProfile")
var modalEditProfile = document.getElementById("modalEditProfile")
var buttonCancelEditProfile = document.getElementById("cancelEditProfile");
var buttonOpenEdit = document.getElementById("open-edit")
var modalEditCard = document.getElementById("card-modal")

buttonOpenEdit.addEventListener("click", function(){
    if (modalEditCard.style.display === "flex") {
        modalEditCard.style.display = "none";
    } else {
        modalEditCard.style.display = "flex";
    }
})

// Abre o modal de adicionar o perfil
modalEditCard.addEventListener("click", function () {
    modalEditProfile.style.display = "block";
    console.log("Funfo");
});

// Fecha o modal de adicionar o perfil
buttonCancelEditProfile.addEventListener("click", function () {
    modalEditProfile.style.display = "none";
})