<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Http\Request;
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

// Route::get('/', [ToDoController::class, 'index']);
// Route::get('/add', [ToDoController::class, 'create']);
// Route::get('/edit', [ToDoController::class, 'edit']);

Route::resource('todos', ToDoController::class)->only([
    'index',
    'create',
    'store',
    'edit',
    'update',
    'destroy',
]);
Route::put('/todos/{todo}/status', [ToDoController::class, 'status'])
->name('todos.status');