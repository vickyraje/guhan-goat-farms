php artisan make:model Name -mc
php artisan optimize:clear
php artisan migrate
php artisan migrate:refresh
php artisan db:seed
php artisan migrate --path=/database/migrations/name.php
php artisan migrate:rollback --path=/database/migrations/name.php
