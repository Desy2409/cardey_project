{{-- @if (session('success'))
<script>
    Swal.fire({
        title: "{{ session('success')['title'] }}"
        , text: "{{ session('success')['message'] }}"
        , icon: "{{ session('success')['icon'] ?? 'success' }}"
        , buttons: {
            cancel: "{{ session('success')['cancelButton'] ?? 'Annuler' }}"
            , confirm: {
                text: "{{ session('success')['confirmButton'] ?? 'OK' }}"
                , value: true
                , visible: true
                , className: ""
                , closeModal: true
            }
        }
    });

</script>
@endif --}}

@if (session('error'))
<script>
    Swal.fire({
        // title: "{{ session('error')['title'] }}",
        // text: "{{ session('error')['message'] }}",
        title: "{!! htmlspecialchars_decode(session('error')['title']) !!}",
        text: "{!! htmlspecialchars_decode(session('error')['message']) !!}",
        icon: "{{ session('error')['icon'] ?? 'error' }}",
        background: '#f8f8f8',
        buttons: {
            // cancel: "{{ session('alertError')['cancelButton'] ?? 'Annuler' }}",
            confirm: {
                text: "{{ session('error')['confirmButton'] ?? 'OK' }}",
                value: true,
                visible: true,
                className: "",
                closeModal: true
            }
        }
    });

</script>
@endif
