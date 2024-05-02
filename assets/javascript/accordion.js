
const accordions = document.querySelectorAll(".section-3-cards")
      
accordions.forEach(accordion =>{
    const header = accordion.querySelector('.titulo-card');

    header.addEventListener('click', ()=> {
        accordions.forEach(item =>{
            item.querySelector('.conteudo-card').classList.remove('active')
        })


        const body = accordion.querySelector('.conteudo-card');
        body.classList.toggle('active');
    })

    })