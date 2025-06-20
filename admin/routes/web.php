<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('products', [ProductController::class,'index']);
Route::get('product/view_product', [ProductController::class, 'view_product'])->name('product.view_product');
Route::get('order', [OrderController::class,'index']);
Route::get('user', [UserController::class,'index']);

Route::get('orders/order_view', [OrderController::class, 'order_view'])->name('orders.order_view');
Route::get('user/user_view', [UserController::class, 'user_view'])->name('user.user_view');
Route::get('deletep_post/{id}', [ProductController::class, 'deletep_post'])->name('deletep_post.{id}');
Route::get('deleteo_post/{id}', [OrderController::class, 'deleteo_post'])->name('deleteo_post.{id}');
Route::get('deleteu_post/{id}', [UserController::class, 'deleteu_post'])->name('deleteu_post.{id}');


Route::get('editp_post/{id}', [ProductController::class, 'editp_post'])->name('editp_post.{id}');
Route::post('updatep_post/{id}', [ProductController::class, 'updatep_post'])->name('updatep_post.{id}');


Route::get('edito_post/{id}', [OrderController::class, 'edito_post'])->name('edito_post.{id}');
Route::post('updateo_post/{id}', [OrderController::class, 'updateo_post'])->name('updateo_post.{id}');

Route::get('editu_post/{id}', [UserController::class, 'editu_post'])->name('editu_post.{id}');
Route::post('updateu_post/{id}', [UserController::class, 'updateu_post'])->name('updateu_post.{id}');

Route::get('category', [CategoryController::class,'index']);
Route::get('categories/category_view', [CategoryController::class, 'category_view'])->name('categories.category_view');
Route::get('editc_post/{id}', [CategoryController::class, 'editc_post'])->name('editc_post.{id}');
Route::get('deletec_post/{id}', [CategoryController::class, 'deletec_post'])->name('deletec_post.{id}');
Route::post('updatec_post/{id}', [CategoryController::class, 'updatec_post'])->name('updatec_post.{id}');

Route::get('order.total_sales', [OrderController::class, 'showTotalSales'])->name('order.total_sales');
Route::get('/total-sales', [OrderController::class, 'showTotalSales'])->name('order.total_sales');

Route::get('/categories', [CategoryController::class, 'category_search'])->name('categories.category_search');
Route::get('/users', [UserController::class, 'user_search'])->name('users.user_search');
Route::get('/products', [ProductController::class, 'product_search'])->name('products.product_search');
Route::get('/orders', [OrderController::class, 'order_search'])->name('orders.order_search');