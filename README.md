# Приложение по продажи курсов
## Что нужно установить
- Node
- Open Server 5.4.*
## Настройка проекта
- Перейти в директорию domains в Open Server
- git clone https://github.com/Serjo30000/PHP-project-coursework-1.git
- Скопировать .env
- php artisan migrate
- Взять директорию images в storage для хранения изображений
- php artisan db:seed --class=DefaultAdminSeeder
- php artisan storage:link
- npm install
## Запуск проекта
- Открыть консоль и git bash
- В консоли прописать php artisan serve
- В git bash прописать npm run dev
- Перейти по ссылке в консоли
## Пользователи
- Админ (Логин: sa, Пароль: 1234567890, Создается через seed или в админ панели, если уже есть админ)
- Автор (Создается в админ панели)
- Клиент (Создается в форме регистрации)