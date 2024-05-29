var buttonEditProfile = document.querySelector(".editProfile")
var modalEditProfile = document.getElementById("modalEditProfile")
var buttonCancelEditProfile = document.getElementById("cancelEditProfile");
var buttonOpenEdit = document.getElementById("open-edit")
// var modalEditCardAll = document.getElementById("card-modal")
var modalEditCard = document.getElementsByClassName("overlay-card")
// console.log("aqui", modalEditCardAll[0].style)


// Botão de edição
// Adiciona o evento de clique ao botão de abrir edição
buttonOpenEdit.addEventListener("click", function(){
    // Alterna a exibição dos elementos modalEditCard entre flexível e oculto
    for (var i = 0; i < modalEditCard.length; i++) {
        if (modalEditCard[i].style.display === "flex") {
            modalEditCard[i].style.display = "none";
        } else {
            modalEditCard[i].style.display = "flex";
        }
    }
});

// Adiciona o evento de clique a cada elemento modalEditCard
for (var i = 0; i < modalEditCard.length; i++) {
    modalEditCard[i].addEventListener("click", function () {
        modalEditProfile.style.display = "block";
        console.log("Funcionou");
    });
}

// Seleciona o botão de cancelar no modal de edição
var buttonCancelEditProfile = document.getElementById("cancelEditProfile");

// Fecha o modal de edição quando o botão de cancelar é clicado
buttonCancelEditProfile.addEventListener("click", function () {
    modalEditProfile.style.display = "none";
});