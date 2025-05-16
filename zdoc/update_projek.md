📁 Struktur Fail Projek 3laravel.dev

3laravel.dev/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   ├── Admin/
│   │   │   └── VcardController.php
│   │   ├── Middleware/
│   │   │   └── IsAdmin.php
│   │   └── Requests/
│   ├── Models/
│   │   └── User.php
│   └── Providers/
├── bootstrap/
│   └── app.php
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   │   └── create_users_table.php
│   └── seeders/
├── public/
│   └── index.php
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── auth/
│       │   └── register.blade.php
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   └── users.blade.php
│       └── vcard.blade.php
├── routes/
│   └── web.php
├── storage/
├── tests/
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
├── phpunit.xml
├── postcss.config.js
├── tailwind.config.js
└── vite.config.js

🔍 Penjelasan Struktur

    app/Http/Controllers/: Mengandungi pengawal untuk pengesahan, pentadbiran, dan paparan kad digital (vCard).

    app/Http/Middleware/IsAdmin.php: Middleware khusus untuk menyemak peranan pengguna sebagai 'admin'.

    app/Models/User.php: Model pengguna dengan medan tambahan seperti phone dan role.

    bootstrap/app.php: Fail konfigurasi utama untuk Laravel 11 Slim, termasuk pendaftaran middleware secara manual.

    resources/views/: Mengandungi templat Blade untuk halaman pendaftaran, papan pemuka admin, senarai pengguna, dan paparan vCard.

    routes/web.php: Fail rute utama yang mengendalikan rute domain utama dan subdomain berdasarkan nombor telefon.

🌐 Contoh Rute Subdomain

Dalam routes/web.php, rute untuk subdomain boleh ditetapkan seperti berikut:

Route::domain('{phone}.dkad.my')->group(function () {
    Route::get('/', [VcardController::class, 'show']);
});

Ini membolehkan akses kepada kad digital pengguna melalui subdomain berdasarkan nombor telefon mereka.
🛠️ Middleware Pendaftaran Manual

Disebabkan Laravel 11 Slim tidak menggunakan Http\Kernel.php, pendaftaran middleware dilakukan secara manual dalam bootstrap/app.php:

->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\IsAdmin::class,
    ]);
})

Ini memastikan middleware admin dikenali dan boleh digunakan dalam rute yang memerlukannya.


📄 Dokumentasi Projek: 3laravel.dev
🧩 Sistem Kad Digital Berasaskan Subdomain WhatsApp
✅ Status Semasa Pembangunan
Komponen	Status
Login & Register	✅ Siap & diuji
Middleware admin	✅ Selesai (daftar manual)
Routing Subdomain	✅ Berfungsi sepenuhnya
Admin Dashboard	✅ Asas selesai
Paparan vCard	✅ Berfungsi ikut nombor telefon
🔧 1. Versi Laravel & Struktur Projek

    Laravel: v11 (struktur slim – tiada Kernel.php)

    Frontend: Blade + Tailwind Breeze

    Database: MySQL (XAMPP)

    Routing: routes/web.php + subdomain via Route::domain()

    Struktur Slim:

        Semua middleware perlu didaftar manual

        bootstrap/app.php digunakan untuk konfigurasi

🔐 2. Sistem Login, Register & Field Tambahan

Field tambahan:

    phone → digunakan sebagai subdomain ({phone}.dkad.my)

    role → nilai default user, boleh ditukar ke admin

Konfigurasi:

    Input phone ditunjukkan dalam borang auth/register.blade.php

    Validasi ditetapkan dalam:

        RegisteredUserController

        CreateUser migration

    Redirect automatik selepas daftar ke subdomain:

    https://{phone}.dkad.my

🌐 3. Subdomain Routing (Kad Digital)

Route::domain('{phone}.dkad.my')->group(function () {
    Route::get('/', [VcardController::class, 'show']);
});

Logik dalam VcardController:

    Jika user wujud → Papar vcard.blade.php

    Jika tidak → Redirect ke WhatsApp: https://wa.me/{phone}

👮‍♂️ 4. Middleware Admin

Isu:

Target class [admin] does not exist

Punca:
Laravel 11 slim tiada Kernel.php – semua middleware perlu didaftar dalam bootstrap/app.php.

Penyelesaian:

->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\IsAdmin::class,
    ]);
})

Kod dalam IsAdmin:

public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }
    abort(403);
}

🧠 5. Struktur Route

// Domain utama
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::get('/users', [UserController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'profile');
});

// Subdomain
Route::domain('{phone}.dkad.my')->group(function () {
    Route::get('/', [VcardController::class, 'show']);
});

📁 6. View Yang Telah Siap
Fail	Fungsi
auth/register.blade.php	Form daftar dengan phone
vcard.blade.php	Papar kad digital
admin/dashboard.blade.php	Paparan dashboard admin
admin/users.blade.php	Senarai pengguna & peranan
💡 Info Penting
Perkara	Nota
Laravel 11 slim	Tidak guna Http/Kernel.php
Middleware	Daftar dalam bootstrap/app.php
Role	Ditentukan dalam DB (user, admin)
Subdomain testing	Ubah hosts file lokal
Composer command	composer dump-autoload, optimize:clear