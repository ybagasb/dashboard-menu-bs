<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $query = Menu::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('url', 'like', '%' . $request->search . '%');
    }

    return view('home', [
        'menus' => $query->get()
    ]);
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| ADMIN (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'nocache'])->group(function () {

    Route::get('/admin', function () {
        return redirect('/admin/menus');
    });

    Route::get('/admin/menus', [MenuController::class, 'index']);
    Route::get('/admin/menus/create', [MenuController::class, 'create']);
    Route::post('/admin/menus', [MenuController::class, 'store']);
    Route::get('/admin/menus/{menu}/edit', [MenuController::class, 'edit']);
    Route::put('/admin/menus/{menu}', [MenuController::class, 'update']);
    Route::delete('/admin/menus/{menu}', [MenuController::class, 'destroy']);
});
