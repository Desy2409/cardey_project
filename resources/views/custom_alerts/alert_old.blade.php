{{-- @if (session('successSave'))
{{ dd(session('successSave')) }}
    <script>
        swal({
            title: "{{ session('successSave')['title'] }}",
            text: "{{ session('successSave')['message'] }}",
            icon: "{{ session('successSave')['icon'] ?? 'success' }}",
            buttons: {
                cancel: "{{ session('alertError')['cancelButton'] ?? 'Annuler' }}",
                confirm: {
                    text: "{{ session('successSave')['confirmButton'] ?? 'OK' }}",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            }
        });
    </script>
@endif --}}

@if (session('success'))
    <script>
        swal({
            title: "{{ session('success')['title'] }}",
            text: "{{ session('success')['message'] }}",
            icon: "{{ session('success')['icon'] ?? 'success' }}",
            buttons: {
                cancel: "{{ session('success')['cancelButton'] ?? 'Annuler' }}",
                confirm: {
                    text: "{{ session('success')['confirmButton'] ?? 'OK' }}",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            },
        });
    </script>
@endif


@if (session('error'))
    <script>
        swal({
            title: "ERREUR APPEL",
            text: "{{ session('error') }}",
            icon: "{{ session('error')['icon'] ?? 'error' }}",
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
{{-- 
@if (session('error'))
    <script>
        swal({
            title: "{{ session('error')['title'] }}",
            text: "{{ session('error')['message'] }}",
            icon: "{{ session('error')['icon'] ?? 'error' }}",
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
@endif --}}