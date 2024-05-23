btn = document.querySelector("#editar")
input = document.querySelector("#campo")
salvar = document.querySelector("#salvar")

btn.addEventListener("click", () => {
    input.style.display = "flex";
    salvar.style.display ="flex";
    btn.style.display = "none"
})