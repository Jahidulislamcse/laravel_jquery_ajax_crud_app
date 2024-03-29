<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[ProductController::class, 'products'])->name('products');
Route::post('/add-product',[ProductController::class, 'addProduct'])->name('add_product');
Route::post('/update-product',[ProductController::class, 'updateProduct'])->name('update_product');
Route::post('/delete-product',[ProductController::class, 'deleteProduct'])->name('delete_product');
Route::post('/delete-product',[ProductController::class, 'deleteProduct'])->name('delete_product');
Route::get('/paginate',[ProductController::class, 'paginate']);
Route::get('/search-product',[ProductController::class, 'searchProduct'])->name('search_product');





require __DIR__.'/auth.php';
