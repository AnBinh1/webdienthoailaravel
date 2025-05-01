<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

//fontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
//sản phẩm chi tiết
Route::get('/chi_tiet_san_pham/{product_id}', [ProductController::class, 'Details_product']);

// backend
Route::get('/admin', [AdminController::class, 'index']); // trang login
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']); // xử lý login
Route::get('/dashboard', [AdminController::class, 'show_dashboard']); // dashboard, phải kiểm tra session
Route::get('/logout', [AdminController::class, 'logout']); // logout

// category_product
Route::get('/add_category_product', [CategoryProductController::class, 'add_category_product']);
Route::get('/edit_category_product/{category_id}', [CategoryProductController::class, 'edit_category_product']);

Route::get('/delete_category_product/{category_id}', [CategoryProductController::class, 'delete_category_product']);

Route::get('/all_category_product', [CategoryProductController::class, 'all_category_product']);

Route::get('/active-category-product/{category_id}', [CategoryProductController::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_id}', [CategoryProductController::class, 'unactive_category_product']);

Route::post('/save_category_product', [CategoryProductController::class, 'save_category_product']);
Route::post('/update_category_product/{category_id}', [CategoryProductController::class, 'update_category_product']);

//brand_product
Route::get('/add_brand_product', [BrandProductController::class, 'add_brand_product']);
Route::get('/edit_brand_product/{brand_id}', [BrandProductController::class, 'edit_brand_product']);

Route::get('/delete_brand_product/{brand_id}', [BrandProductController::class, 'delete_brand_product']);

Route::get('/all_brand_product', [BrandProductController::class, 'all_brand_product']);

Route::get('/active-brand-product/{brand_id}', [BrandProductController::class, 'active_brand_product']);
Route::get('/unactive-brand-product/{brand_id}', [BrandProductController::class, 'unactive_brand_product']);

Route::post('/save_brand_product', [BrandProductController::class, 'save_brand_product']);
Route::post('/update_brand_product/{brand_id}', [BrandProductController::class, 'update_brand_product']);

//product
Route::get('/add_category_product', [CategoryProductController::class, 'add_category_product']);
Route::get('/edit_category_product/{category_id}', [CategoryProductController::class, 'edit_category_product']);

Route::get('/delete_category_product/{category_id}', [CategoryProductController::class, 'delete_category_product']);

Route::get('/all_category_product', [CategoryProductController::class, 'all_category_product']);

Route::get('/active-category-product/{category_id}', [CategoryProductController::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_id}', [CategoryProductController::class, 'unactive_category_product']);

Route::post('/save_category_product', [CategoryProductController::class, 'save_category_product']);
Route::post('/update_category_product/{category_id}', [CategoryProductController::class, 'update_category_product']);

//brand_product
Route::get('/add_product', [ProductController::class, 'add_product']);
Route::get('/edit_product/{product_id}', [ProductController::class, 'edit_product']);

Route::get('/delete_product/{product_id}', [ProductController::class, 'delete_product']);

Route::get('/all_product', [ProductController::class, 'all_product']);

Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);

Route::post('/save_product', [ProductController::class, 'save_product']);
Route::post('/update_product/{product_id}', [ProductController::class, 'update_product']);

//cart
Route::post('/save_cart',[CartController::class,'save_cart']);
