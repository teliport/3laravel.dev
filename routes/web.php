<?php


use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProfileController;

// 🟢 Route domain utama (dkad.my) + Admin
Route::middleware(['auth'])->group(function () {
    
    // 📌 ADMIN hanya pada domain utama, bukan subdomain
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        Route::get('/users', function () {
            $users = User::all();
            return view('admin.users', compact('users'));
        });
    });

    // 📌 Dashboard biasa
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🟣 Routing khas untuk subdomain: {phone}.dkad.my
Route::domain('{phone}.dkad.my')->group(function () {
    Route::get('/', function ($phone) {
        $user = User::where('phone', $phone)->first();

        if ($user) {
            return view('vcard', ['user' => $user]);
        }

        return redirect()->to('https://wa.me/' . $phone);
    });

    // Optional: benarkan /dashboard juga untuk subdomain
    Route::get('/dashboard', function ($phone) {
        return view('dashboard'); // Atau paparan khas jika mahu
    })->middleware(['auth']);
});

require __DIR__.'/auth.php';
