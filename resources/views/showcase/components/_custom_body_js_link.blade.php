<script>
    // Récupérer tous les liens de la page avec l'attribut href qui commence par "#"
    const links = document.querySelectorAll('a[href^="#"]');

    // Parcourir tous les liens et ajouter un gestionnaire d'événement au clic
    links.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Empêcher le comportement de lien par défaut

            // Récupérer l'attribut href du lien cliqué
            const target = link.getAttribute('href');

            // Modifier le titre de la page en fonction de la cible du lien
            if (target === '#hero') {
                document.title = 'Accueil | CARDEY'
            } else if (target === '#about') {
                document.title = 'A propos de nous | CARDEY'
            } else if (target === '#team') {
                document.title = 'Notre équipe | CARDEY'
            } else if (target === '#gallery') {
                document.title = 'Gallerie | CARDEY'
            } else if (target === '#faq') {
                document.title = 'FAQ | CARDEY'
            } else if (target === '#contact') {
                document.title = 'Conact | CARDEY'
            }
            // Ajoutez d'autres conditions pour les autres liens de votre page

            // Faire défiler la page jusqu'à la cible du lien
            document.querySelector(target).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

</script>
