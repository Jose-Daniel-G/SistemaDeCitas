        @if (($info = Session::get('info'))&&($icono = Session::get('icono')))
            <script>
            Swal.fire({
                title: "{{ $icono }}",
                text: "{{ $info }}",
                icon: "success"
            });
        </script>