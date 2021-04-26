PHP 8.0.3

Актуальная ветка develop.

Заполнить laravel/.env по примеру laravel/.env.exapmle (обязательно два последних поля для google sheets).
Заполнить .env по примеру .env.template
Поместите файл credentials.json в laravel/storage/app/credentials/ (для работы с google sheets).

Порядок выполнения скриптов для докера:

    ldc build
    ldc up
    mkdir laravel/storage/framework
    mkdir laravel/storage/framework/cache
    mkdir laravel/storage/framework/sessions
    mkdir laravel/storage/framework/views
    ldc composer-install
    php artisan migrate --seed (можно вызвать из ldc bash)
    
    
Список доступных команд доступен при вводе ldc в консоль
    
    ldc up, ldc down, ldc bash - те, которые вероятнее всего пригодятся)
    

Есть один тест для проверки сидеров
