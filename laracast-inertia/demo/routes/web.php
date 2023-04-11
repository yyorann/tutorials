<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;


Route::get('login', [LoginController::class, 'create']) -> name('login');

Route::post('login', [LoginController::class, 'store']);



Route::middleware('auth')->group(function() {


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
});

Route::get('/users/create', function() {
    return Inertia::render('UsersCreate');
});


Route::get('/setings', function() {
    return Inertia::render('Settings');
});
























