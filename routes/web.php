<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Recipes;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Login/Register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotte admin protette
Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function(){
    Route::resource('category', CategoryController::class)->names('admin.categories');
    Route::resource('recipes', RecipeController::class)->names('admin.recipes');
    Route::resource('users', UserController::class)->names('admin.users');
});

// Rotte pubbliche
Route::get('/recipes', [Recipes::class, 'getRecipes'])->name('recipes');
Route::get('/recipes/{id}', [Recipes::class, 'showDetailRecipe'])->name('recipe.detail');
Route::get('/search-recipes', [PublicController::class, 'search'])->name('search');
Route::get('/categories', [ControllersCategoryController::class, 'getCategories'])->name('categories.index');
Route::get('/category/{category}', [PublicController::class, 'getCatgoryRecipes'])->name('categories.show');