<?php

use App\Models\Book;
use App\Models\Room;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

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
    $data = [
        'rooms' => Room::all(),
        'books' => Book::where('date', '>=', now())->where('approved', 1)->orderBy('date', 'desc')->get()
    ];
    return view('books.welcome', $data);
});

ROute::get('books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{book}', [BookController::class, 'show_visitor']);

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index']);


Route::group(['middleware' => ['auth', 'checkRole']], function () {
    Route::resources([
        '/dashboard/books' => BookController::class,
        '/dashboard/users' => UserController::class,
        '/dashboard/rooms' => RoomController::class,
    ]);
});
