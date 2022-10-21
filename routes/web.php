<?php

// use App\Models\Project;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\PlasticProductController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ClientAccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes    
|--------------------------------------------------------------------------
|
| Here is where web routes for the application is registered. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/


// ROUTE: HOME PAGE with Projects listed.
// Route::get('/', function () {
//     return view('welcome', [
//         'projects' => Project::all()
//     ]);
// });

// ROUTE: PROJECTS PAGE with Projects slug pages.
// Route::get('/project/{project:slug}', function (Project $project) {
//     return view('project', [
//         'project' => $project
//     ]);
// })->where('project', '[A-z\-]+');


// ROUTE: HOME PAGE
Route::get('/', [PageController::class, 'index']);
// Route::get('/', 'PageController@index');

// ROUTE: ABOUT PAGE
Route::get('/about', 'PageController@about');


// ROUTE: ECO QUICK CALCULATOR PAGE
Route::get('/quick-calculator/page1', [QuestionnaireController::class, 'quickQuestion1']);
// Route::post('/quick-calculator/page1', [QuestionnaireController::class, 'quickQuestion1Post']);
// Route::get('/quick-calculator/page{quick_questionnaire:id}', [QuestionnaireController::class, 'quickQuestion1Form']);
// Route::post('/quick-calculator/page{quick_questionnaire:id}', [QuestionnaireController::class, 'quickQuestion1Post']);
Route::get('/quick-calculator/page2/{quick_choices:slug}', [QuestionnaireController::class, 'quickQuestion2'])->where('quick_choices', '[A-z\-]+');
// Route::post('/quick-calculator/page2', [QuestionnaireController::class, 'quickQuestion2Post']);
Route::get('/quick-calculator/results', [QuestionnaireController::class, 'results']);


// CONSOLE LOGIN PAGE
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

// CONSOLE USERS/ADMINS CMS PAGES
Route::get('/console/admins/list', [UserController::class, 'list'])->middleware('auth');
Route::get('/console/admins/add', [UserController::class, 'addForm'])->middleware('auth');
Route::post('/console/admins/add', [UserController::class, 'add'])->middleware('auth');
Route::get('/console/admins/edit/{user:id}', [UserController::class, 'editForm'])->where('admin', '[0-9]+')->middleware('auth');
Route::post('/console/admins/edit/{user:id}', [UserController::class, 'edit'])->where('admin', '[0-9]+')->middleware('auth');
Route::get('/console/admins/delete/{user:id}', [UserController::class, 'delete'])->where('admin', '[0-9]+')->middleware('auth');

// CONSOLE CLIENTS CMS PAGES
Route::get('/console/clients/list', [ClientAccountController::class, 'list'])->middleware('auth');
Route::get('/console/clients/add', [ClientAccountController::class, 'addForm'])->middleware('auth');
Route::post('/console/clients/add', [ClientAccountController::class, 'add'])->middleware('auth');
Route::get('/console/clients/edit/{clientaccount:id}', [ClientAccountController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/clients/edit/{clientaccount:id}', [ClientAccountController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/clients/delete/{clientaccount:id}', [ClientAccountController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

// CONSOLE PLASTIC PRODUCTS CMS PAGES
Route::get('/console/plastic-products/list', [PlasticProductController::class, 'list'])->middleware('auth');
Route::get('/console/plastic-products/add', [PlasticProductController::class, 'addForm'])->middleware('auth');
Route::post('/console/plastic-products/add', [PlasticProductController::class, 'add'])->middleware('auth');
Route::get('/console/plastic-products/edit/{plasticproduct:id}', [PlasticProductController::class, 'editForm'])->where('plasticproduct', '[0-9]+')->middleware('auth');
Route::post('/console/plastic-products/edit/{plasticproduct:id}', [PlasticProductController::class, 'edit'])->where('plasticproduct', '[0-9]+')->middleware('auth');
Route::get('/console/plastic-products/delete/{plasticproduct:id}', [PlasticProductController::class, 'delete'])->where('plasticproduct', '[0-9]+')->middleware('auth');

Route::get('/console/plastic-products/icon/{plasticproduct:id}', [PlasticProductController::class, 'iconForm'])->where('plasticproduct', '[0-9]+')->middleware('auth');
Route::post('/console/plastic-products/icon/{plasticproduct:id}', [PlasticProductController::class, 'icon'])->where('plasticproduct', '[0-9]+')->middleware('auth'); // Text in quotes in brackets are public functions defined in respective controllers.

Route::get('/console/plastic-products/image/{plasticproduct:id}', [PlasticProductController::class, 'imageForm'])->where('plastic_product', '[0-9]+')->middleware('auth');
Route::post('/console/plastic-products/image/{plasticproduct:id}', [PlasticProductController::class, 'image'])->where('plastic_product', '[0-9]+')->middleware('auth');


// CONSOLE QUESTIONNAIRE CMS PAGES
Route::get('/console/questionnaire/list', [QuestionnaireController::class, 'list'])->middleware('auth');
Route::get('/console/questionnaire/add', [QuestionnaireController::class, 'addForm'])->middleware('auth');
Route::post('/console/questionnaire/add', [QuestionnaireController::class, 'add'])->middleware('auth');
Route::get('/console/questionnaire/edit/{questionnaire:id}', [QuestionnaireController::class, 'editForm'])->where('questionnaire', '[0-9]+')->middleware('auth');
Route::post('/console/questionnaire/edit/{questionnaire:id}', [QuestionnaireController::class, 'edit'])->where('questionnaire', '[0-9]+')->middleware('auth');


// CONSOLE TYPES CMS PAGES
Route::get('/console/types/list', [TypesController::class, 'list'])->middleware('auth');
Route::get('/console/types/add', [TypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/types/add', [TypesController::class, 'add'])->middleware('auth');
Route::get('/console/types/edit/{type:id}', [TypesController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/types/edit/{type:id}', [TypesController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/types/delete/{type:id}', [TypesController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

// CONSOLE PROJECTS CMS PAGES
Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');