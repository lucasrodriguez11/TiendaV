<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//Lista todos los productos de la base de datos
Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');
//Devuelve una vista para cargar un nuevo producto
Route::get('/products/create',[ProductController::class,'create'])
        ->name('products.create');
//Almacena los datos del productos
Route::post('/products',[ProductController::class,'store'])
        ->name('products.store');
//Editar un producto
Route::get('products/{id}/edit',[ProductController::class,'edit'])
        ->name('products.edit');
//Actualizar producto
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
//Eliminar producto
Route::delete('products/{id}',[ProductController::class,'destroy'])
->name('products.destroy');


