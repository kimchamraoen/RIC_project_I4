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
use App\Livewire\Research\Addresearch;
use App\Livewire\Research\Question;
use App\Http\Controllers\Auth\AddResearchController;
use App\Livewire\Auth\Conduct;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Homepage\Search;
use App\Livewire\UserProfile\Profile;
use App\Livewire\Research\Iterms;


Route::get('/', Search::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/conduct', Conduct::class)->name('conduct');
// Route for standard registration (without user_id)
Route::get('/register', Register::class)->name('register');

// Route for registration with user_id
Route::get('/register/{user_id}', Register::class)->name('register_with_user_id');
// Route::get('/addresearch',Addresearch::class)->name('addresearch'); 
// Route::get('/question', Question::class)->name('question');
Route::get('/profile', Profile::class)->name('profile');
Route::get('/iterms', Iterms::class)->name('iterms');
Route::get('/add', Addresearch::class)->name('add');
Route::get('/question', Question::class)->name('question');
