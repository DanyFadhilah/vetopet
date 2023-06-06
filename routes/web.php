<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::group(['middleware' => 'auth'], function () {
    // Route untuk role admin
    Route::get('/admin/dashboard', function () {
        // Logika untuk role admin
    })->middleware('admin');

    // Route untuk role customer
    Route::get('/customer/dashboard', function () {
        Route::get('/shop', [App\Http\Controllers\ProductController::class, 'all_shop'])->name('all_shop');
Route::get('/shop/{jenisanimal}', [App\Http\Controllers\ProductController::class, 'indexByAnimal'])->name('shop_kucing');
Route::get('/shop/{category}', [App\Http\Controllers\ProductController::class, 'indexByCategory'])->name('shop');
    })->middleware('customer');
});

// Route untuk guest
Route::get('/home', function () {
    // Logika untuk guest
})->middleware('guest');

Route::get('index', function () {
    return view('index');
})->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/service', [App\Http\Controllers\ProductController::class, 'all_category'])->name('service');

Route::get('/logout', [App\Http\Controllers\Homecontroller::class, 'logout'])->name('logout');

Auth::routes();


// Route::middleware('guest')->group(function () {
//     // Login Admin
//     Route::get('/login/web-smk/admin/sch', [App\Http\Controllers\FrontController::class, 'loginAdmin'])->name('login.admin');
//     Route::post('/login/web-smk/admin/sch', [App\Http\Controllers\FrontController::class, 'postLoginAdmin']);

//     // Login Guru
//     Route::get('/login', [App\Http\Controllers\FrontController::class, 'loginTeacher'])->name('login.teacher');
//     Route::post('/login', [App\Http\Controllers\FrontController::class, 'postLoginTeacher']);
// });

Route::get('/shop', [App\Http\Controllers\ProductController::class, 'all_shop'])->name('all_shop');
Route::get('/shop/{jenisanimal}', [App\Http\Controllers\ProductController::class, 'indexByAnimal'])->name('shop_kucing');
Route::get('/shop/{category}', [App\Http\Controllers\ProductController::class, 'indexByCategory'])->name('shop');

Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::prefix('register')->group(function () {
    Route::get('/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
    Route::post('/admin', [RegisterController::class, 'register'])->name('admin.register');
    Route::get('/customer', [RegisterController::class, 'showCustomerRegistrationForm'])->name('register.customer');
    Route::post('/customer', [RegisterController::class, 'register'])->name('customer.register');
});

// Rute untuk admin
    Route::get('/admin/dashboard/home', [App\Http\Controllers\AdminController::class, 'index']   );
    // Admin
    Route::get('/admin/dashboard/add', [App\Http\Controllers\AdminController::class, 'addAdmin'])->name('add.admin');
    Route::post('/admin/dashboard/add/store', [App\Http\Controllers\AdminController::class, 'postAddAdmin']);
    // Table
    Route::get('/admin/dashboard/table/list/admin', [App\Http\Controllers\AdminController::class, 'tableAdmin'])->name('table.admin.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/admin/{id}/detail', [App\Http\Controllers\AdminController::class, 'detailAdmin'])->name('view.detail.admin');
    // Edit
    Route::get('/admin/dashboard/table/list/admin/{id}/edit', [App\Http\Controllers\AdminController::class, 'editAdmin'])->name('edit.admin');
    Route::put('/admin/dashboard/table/list/admin/{id}/update', [App\Http\Controllers\AdminController::class, 'updateAdmin'])->name('update.admin');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/admin/{id}/edit/password', [App\Http\Controllers\AdminController::class, 'editPasswordAdmin'])->name('edit.password.admin');
    Route::post('/admin/dashboard/table/list/admin/{id}/update/password', [App\Http\Controllers\AdminController::class, 'updatePasswordAdmin'])->name('update.password.admin');
    // Import Admin
    Route::post('/admin/dashboard/add/admin/import', [App\Http\Controllers\AdminController::class, 'importAdmin']);
    // Hapus Admin
    Route::delete('/admin/dashboard/table/list/admin/{id}/destroy', [App\Http\Controllers\AdminController::class, 'destroyAdmin'])->name('destroy.admin');

    // Guru
    Route::get('/admin/dashboard/add/product', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/admin/dashboard/add/product/store', [App\Http\Controllers\ProductController::class, 'postAddProduct'])->name('postAddProduct');
    // Table
    Route::get('/admin/dashboard/table/list/Product', [App\Http\Controllers\ProductController::class, 'tableProduct'])->name('table.product.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/product/{id}/detail', [App\Http\Controllers\ProductController::class, 'detailProduct'])->name('view.detail.product');
    // Edit
    Route::get('/admin/dashboard/table/list/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('edit.product');
    Route::put('/admin/dashboard/table/list/product/{id}/update', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update.product');
    // Import Guru
    Route::post('/admin/dashboard/add/product/import', [App\Http\Controllers\ProductController::class, 'importProduct']);
    // Hapus Guru
    Route::delete('/admin/dashboard/table/list/product/{id}/destroy', [App\Http\Controllers\ProductController::class, 'destroyProduct'])->name('destroy.product');



// Rute untuk pelanggan
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::get('/service', [App\Http\Controllers\ProductController::class, 'all_category'])->name('service');

    Route::get('/logout', [App\Http\Controllers\Homecontroller::class, 'logout'])->name('logout');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cart}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');