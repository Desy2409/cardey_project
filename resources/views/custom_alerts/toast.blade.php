@if (session('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
                // Manipuler le style du toast
                // toast.style.width = '550px'; // Ajoutez la largeur souhaitée ici
        
        }
    })

    Toast.fire({
        icon: 'success',
        title: "{!! htmlspecialchars_decode(session('success')['title']) !!}",
        text: "{!! htmlspecialchars_decode(session('success')['message']) !!}",
    })
</script>
@endif
