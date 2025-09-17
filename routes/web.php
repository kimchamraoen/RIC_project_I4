<?php


use App\Livewire\Login\Form;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Register\ConductResearch;
use App\Livewire\Register\ConnectionResearcher;
use App\Livewire\Research\ResearchItems;
use App\Livewire\Research\Addresearch;
use App\Livewire\Research\Question;
use App\Http\Controllers\Auth\AddResearchController;

// Route::get('/', Crud::class)->name('home');
Route::get('/login', Form::class)->name('login');
Route::get('/conduct', ConductResearch::class)->name('conduct');
Route::get('/connection', ConnectionResearcher::class)->name('register');
Route::get('/research',ResearchItems::class)->name('research');
Route::get('/addresearch',Addresearch::class)->name('addresearch'); 
Route::get('/question', Question::class)->name('question');

