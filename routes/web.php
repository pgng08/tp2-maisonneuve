<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use GuzzleHttp\Middleware;


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
// ===== ROUTES PAGE HOME/INDEX =====
Route::get('/', [Controller::class, "home"])->name("welcome");
Route::get('/index', [Controller::class, "home"])->name("welcome");
Route::get('/home', [Controller::class, "home"])->name("welcome");
// ===== FIN =====


// ===== ROUTES POUR ETUDIANTS/USERS =====
// Route page affiche la liste des etudiants
Route::get('/etudiant', [EtudiantController::class, "index"])->name("etudiant.index");

// Route page voir un etudiant (id)
Route::get('/etudiant/{etudiant}', [EtudiantController::class, "show"])->name("etudiant.show");

// Route page d'ajoute d'un etudiant
Route::get('/etudiant-create', [EtudiantController::class, "create"])->name("etudiant.create");
Route::post('/etudiant-create', [EtudiantController::class, "store"]);

// Route page pour editer un etudiant
Route::get('/etudiant-edit/{etudiant}', [EtudiantController::class, "edit"])->name("etudiant.edit");
Route::put('/etudiant-edit/{etudiant}', [EtudiantController::class, "update"]);
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, "destroy"]);
// ===== FIN =====


// ===== ROUTES POUR LOGIN USER =====
// Route User
Route::get('register', [CustomAuthController::class, "create"])->name("auth.create");
Route::post('register', [CustomAuthController::class, "store"]);
Route::get('login', [CustomAuthController::class, "index"])->name("login");
Route::get('logout', [CustomAuthController::class, "logout"])->name("logout");
Route::post('authentication', [CustomAuthController::class, "authentication"])->name("authentication");
Route::get('user-list', [CustomAuthController::class, "userList"])->name("user.list")->middleware("auth");
// ===== FIN =====


// ===== ROUTES POUR LOCALE =====
// Route Langues FR EN
Route::get('lang/{locale}', [LocalizationController::class, "index"])->name("lang");
// ===== FIN =====


// ===== ROUTES POUR BLOG POSTS =====
// Route page affiche la liste du blog
Route::get('/blog', [BlogPostController::class, "index"])->name("blog.index");

// Route page voir un article blog (id)
Route::get('/blog/{blogPost}', [BlogPostController::class, "show"])->name("blog.show");

// Route page d'ajoute d'un article blog
Route::get('/blog-create', [BlogPostController::class, "create"])->name("blog.create");
Route::post('/blog-create', [BlogPostController::class, "store"]);

// Route page pour editer un article blog
Route::get('/blog-edit/{blogPost}', [BlogPostController::class, "edit"])->name("blog.edit");
Route::put('/blog-edit/{blogPost}', [BlogPostController::class, "update"]);
Route::delete('/blog/{blogPost}', [BlogPostController::class, "destroy"]);

// Route Pagination des posts dans blog
Route::get('page', [BlogPostController::class, "page"]);
// ===== FIN =====

// ===== ROUTE DOM PDF =====
Route::get('/blog-pdf/{blogPost}', [BlogPostController::class, 'showPdf'])->name("blog.show.pdf");
// ===== FIN =====
