<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;



Route::get('/auth/google', function () {
    return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName() ?? 'No Name',
            'google_id' => $googleUser->getId(),
        ]
    );

    Auth::login($user);
  $user->update(['last_login' => now()]);
    

    return redirect('/'); 
});


Route::get('/', function () {
    return view('home', ['user' => Auth::user()]);
});

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/register',[AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login',[AuthController::class, 'showLogin'])->name('show.login');

Route::post('/register',[AuthController::class, 'Register'])->name('register');
Route::post('/login',[AuthController::class, 'Login'])->name('login');

Route::middleware(['web','auth'])->group(function () {
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/interntemp', [DocumentController::class, 'i_temp'])->name('documents.interntemp');


    Route::get('/documents/template/{template}', [DocumentController::class, 'showTemplate'])
    ->name('documents.template');
    

    Route::get('/documents/form/{template}', [DocumentController::class, 'showForm'])
        ->name('documents.form');

    Route::post('/documents/preview/{template}', [DocumentController::class, 'previewDocument'])
        ->name('documents.preview');

    Route::post('/documents/generate/{template}', [DocumentController::class, 'generateDocument'])
        ->name('documents.generate');

    Route::get('/my-documents', [DocumentController::class, 'myDocuments'])
        ->name('documents.my');

    Route::get('/documents/download/{template}', [DocumentController::class, 'downloadPDF'])
     ->name('documents.download');


    }
);