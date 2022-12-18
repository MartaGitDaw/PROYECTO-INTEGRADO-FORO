# QUANTUM BIT FORUM

> Un lugar donde compartir noticias de actualidad de tu sector, tus progresos, logros, o lo que se te venga a la mente

## Laravel 9 - Laravel Lang - Jetstream

Inicio del proyecto, intalación de gestor de traducción.
>>[Laravel Lang](https://publisher.laravel-lang.com/using/)

```bash
#!/bin/bash
composer create-project laravel/laravel nombre_de_tu_proyecto
composer require laravel-lang/Lang
```

Copiar carpeta vendor/laravel-lang/lang/locales/es en -> lang/

 >Jetstream proporciona la implementación para el inicio de sesión, registro, verificación de correo electrónico, autenticación de dos factores, administración de sesiones, API de su aplicación a través de Laravel Sanctum y características opcionales de gestión de equipos.
 >Jetstream está diseñado usando Tailwind CSS y ofrece su elección de Livewire o Inertia
 >>[Laravel Jetstream](https://jetstream.laravel.com/2.x/installation.html)
 >>[Laravel Livewire](https://laravel-livewire.com/docs/2.x/quickstart)


```bash
#!/bin/bash
composer require laravel/jetstream
php artisan jetstream:install livewire
```

Configuración del archivo .env
Conexión con la base de datos.

```bash
#!/bin/bash
npm install
npm run dev
```

En config/forty.php

```bash
#!/bin/bash

'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
            // 'window' => 0,
        ]),
    ],
```

En config/jetstream.php

```bash
#!/bin/bash
 'features' => [
        // Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],
```

```bash
#!/bin/bash

php artisan migrate:fresh
php artisan vendor:publish --tag=jetstream-views
```

## Font Awesome

> Los iconos utulizados son de Font Awesome. Se puede descargar o meter en los layouts el cdn.
>>[Font Awesome](https://fontawesome.com/docs/web/setup/packages)

## FakerPiscumImages

> Proveedor de imágenes alternativo para fakerphp usando picsum.photos

>>[fakerphp-picsum-images](https://github.com/smknstd/fakerphp-picsum-images)

## Laravel-permission SPATIE

> Este paquete le permite administrar los permisos y roles de los usuarios en una base de datos.
>>[SPATIE Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction)

```bash
#!/bin/bash
composer require spatie/laravel-permission
```

En config/app.php añadir proveedor de servicios

```bash
#!/bin/bash
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];
```

```bash
#!/bin/bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
php artisan migrate

```

### Proteger rutas

app/Http/kernel.php

```bash
#!/bin/bash
protected $routeMiddleware = [
        //...

        // Proteger las rutas SPATIE
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,

    ];
```

### Crear Roles

```bash
#!/bin/bash
php artisan make:seeder RoleSeeder
```

database/seeders/RoleSeeder.php

```bash
#!/bin/bash
public function run()
    {
        Role::create(['name' => 'admin']);
    }
```

database/seeders/DatabaseSeeder.php

```bash
#!/bin/bash
    public function run()
    {

        // Roles
        $this->call(RoleSeeder::class);
    }
```

### Crear Usuario Admin

```bash
#!/bin/bash
php artisan make:seeder AdminSeeder
```

database/seeders/AdminSeeder.php

```bash
#!/bin/bash
    public function run()
    {
        User::create( [
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
    }
```

Asignamos el rol de admin al usuario administrador
Se puede asignar un rol a cualquier usuario: `$user->assignRole('writer');`

database/seeders/DatabaseSeeder.php

```bash
#!/bin/bash
 public function run()
    {

        // Roles
        $this->call(RoleSeeder::class);

        // Admin
        $this->call(AdminSeeder::class);
    }
```

```bash
#!/bin/bash
php artisan migrate:fresh -–seed
```
