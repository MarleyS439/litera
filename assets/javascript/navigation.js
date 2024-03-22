const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', function () {
        // Remove a classe de todos os links
        navLinks.forEach(navLink => {
            navLink.classList.remove('active');
        });

        // Adiciona a classe apenas ao link clicado
        this.classList.add('active');
    });
});
