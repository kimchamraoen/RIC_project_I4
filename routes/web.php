<?php

// use App\Livewire\Crud;

use App\Livewire\Crud;
use App\Livewire\Login\Form;
// use App\Livewire\Register;
// use App\Livewire\Register\Navbar;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Register\ConductResearch;
use App\Livewire\Register\ConnectionResearcher;
use App\Livewire\Research\ResearchItems;
use App\Livewire\Research\Addresearch;
use App\Livewire\Research\Question;
use App\Http\Controllers\Auth\AddResearchController;
use App\Livewire\Auth\Conduct;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Homepage\Search;

Route::get('/', Search::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/conduct', Conduct::class)->name('conduct');
// Route for standard registration (without user_id)
Route::get('/register', Register::class)->name('register');

// Route for registration with user_id
Route::get('/register/{user_id}', Register::class)->name('register_with_user_id');
// Route::get('/research',ResearchItems::class)->name('research');
// Route::get('/addresearch',Addresearch::class)->name('addresearch'); 
// Route::get('/question', Question::class)->name('question');
//Route::get('/dashboard', function () {
   // return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerificationController::class, 'verify'])
   // ->middleware(['auth', 'signed'])
   // ->name('verification.verify');
//Route::get('/confirm-password', [\App\Http\Controllers\Auth\ConfirmPasswordController::class, 'show'])
    //->middleware('auth')
    //->name('password.confirm');

//Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'show'])
    //->name('password.request');

//Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'show'])
    //->name('password.reset');//


