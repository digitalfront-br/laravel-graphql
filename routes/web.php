<?php

use App\Mail\ConfirmUserMail;
use App\Models\User;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/ee', function () {
    $user = User::find(5);
    return new ConfirmUserMail($user);
});

Route::get('/mail/2$2y$10$erEGRcc3sg4emN7snHtg{id}Su.5XpWTHHV3EIRcvZ6qum657yo76aoh6', function ($id) {
    $user = User::find($id);
    $user->email_verified_at = now();
    $user->save();
    return redirect()->away('http://localhost:4200/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
