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


php artisan make:model Event -mcr
php artisan make:model Consultorio -mcr
php artisan make:model Doctor -mcr
php artisan make:model Horario -mcr
php artisan make:model Pasciente -mcr
php artisan make:model Secretaria -mcr
php artisan make:model Usuario -mcr