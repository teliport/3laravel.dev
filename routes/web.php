<?php


use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;

Route::get('/', function () {
    if (!Storage::exists('landing.html')) {
        return 'Landing page belum disediakan.';
    }

    $html = Storage::get('landing.html');
    return view('grapes.landing_output', compact('html'));
});


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

        return redirect()->to('https://wa.me/6' . $phone);
    });

    // Optional: benarkan /dashboard juga untuk subdomain
    Route::get('/dashboard', function ($phone) {
        return view('dashboard'); // Atau paparan khas jika mahu
    })->middleware(['auth']);
});

Route::post('/api/save-landing', function (Request $request) {
    $html = $request->input('html');
    $css = $request->input('css');

    $content = "<style>{$css}</style>\n{$html}";

    Storage::disk('local')->put('landing.html', $content);

    return response()->json(['success' => true]);
})->middleware('auth'); // optional: hanya untuk admin


Route::get('/editor', function () {
    return view('grapes.editor');
})->middleware(['auth', 'admin']);



require __DIR__.'/auth.php';
