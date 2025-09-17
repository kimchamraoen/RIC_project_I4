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

Route::get('/', Crud::class)->name('home');
Route::get('/login', Form::class)->name('login');
Route::get('/conduct', ConductResearch::class)->name('conduct');
Route::get('/connection', ConnectionResearcher::class)->name('register');

