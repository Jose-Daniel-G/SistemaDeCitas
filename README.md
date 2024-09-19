        @if (($info = Session::get('info'))&&($icono = Session::get('icono')))
            <script>
            Swal.fire({
                title: "{{ $icono }}",
                text: "{{ $info }}",
                icon: "success"
            });
        </script>
        php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload -o