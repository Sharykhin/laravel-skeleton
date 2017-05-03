Project SHOP Backend:
=====================


[Style guide](/style_guide.md)

[Api](/api.md)

Installation:
-------------
1. Make copy of .env.example to .env

```bash
cp .env.example to .env
```

2. Install composer dependencies:

```bash
composer install
```

3. Create database and put credentials into .env

4. Run migrations:
```bash
php artisan migrate
```

Usage:
------

To get profile information use ```debug=true``` query parameter

