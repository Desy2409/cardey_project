@if (session('success'))
<script>
    Toastify({
        // text: "{{ session('success')['message'] }}",
        text: "{!! htmlspecialchars_decode(session('success')['message']) !!}",
        // text: `<i class="fa fa-check"></i> {{ session('success')['message'] }}`,
        close: true, // Afficher le bouton de fermeture du toast
        duration: 4000, // Durée en millisecondes
        newWindow: true, // Ouvrir le toast dans une nouvelle fenêtre
        gravity: 'bottom', // Position du toast (top, bottom, left, right)
        position: 'right', // Alignement du toast (left, center, right)
        style: {
            background: 'linear-gradient(to right, #00b09b, #96c93d)', // Couleur de fond du toast
            // background: 'linear-gradient(90deg, rgba(232, 104, 29, 1) 0%, rgba(205, 0, 130, 1) 35%, rgba(3, 194, 177, 1) 100%)', // Couleur de fond du toast
        },
        stopOnFocus: true, // Arrêter la durée du toast lorsqu'il obtient le focus
    }).showToast();
</script>
@endif
