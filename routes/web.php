<?php

use App\Livewire\Crud;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
Route::get('/', Crud::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/register',Register::class);

