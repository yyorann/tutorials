<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function() {
    // return User::paginate(10);
    return Inertia::render('Users', [
        'users' => User::paginate(10) -> through(fn($user) => [
            'id' => $user -> id,
            'name' => $user -> name
        ]),
    ]);
});

Route::get('/settings', function() {
    return Inertia::render('Settings');
});

Route::post('/logout', function() {
    dd('logging out...');
});






























Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
