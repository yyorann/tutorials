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
    return Inertia::render('UsersIndex', [
        'users' => User::query()
            -> when(Request::input('search'), function($query, $search) {
                $query -> where('name', 'like', "%{$search}%");
            })
            -> paginate(10)
            -> withQueryString()
            -> through(fn($user) => [
                'id' => $user -> id,
                'name' => $user -> name
            ]),

        'filters' => Request::only(['search'])
    ]);
});

Route::get('/settings', function() {
    return Inertia::render('Settings');
});

Route::get('/users/create', function(){
    return Inertia::render('UsersCreate');
});

Route::post('/logout', function() {
    dd('logging out...');
});

Route::post('/users', function() {
    // sleep(3);

    $attributes = Request::validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);

    // User::create($attributes);

    User::create([
        'name' => Request::input('name'),
        'email' => Request::input('email'),
        'password' => bcrypt( Request::input('password') ),
    ]);


    return redirect('/users');
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
