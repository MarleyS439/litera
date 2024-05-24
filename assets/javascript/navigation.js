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
document.addEventListener("DOMContentLoaded", function() {
    const icons = document.querySelectorAll('.icon');
    const contents = document.querySelectorAll('.content');

    icons.forEach(icon => {
        icon.addEventListener('click', function() {
            const contentId = this.getAttribute('data-content');

            contents.forEach(content => {
                if (content.id === contentId) {
                    content.classList.add('active');
                } else {
                    content.classList.remove('active');
                }
            });
        });
    });
});