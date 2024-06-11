<?php

// use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');

    // Data Master
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/item-types', 'Admin\ItemTypeController');
    Route::resource('/items', 'Admin\ItemController');
    Route::resource('/item-borrowers', 'Admin\ItemUserController');
    Route::resource('/item-borrowers-history', 'Admin\ItemBorrowerHistoryController');

    // Detail item on JSON
    Route::get('/item-json/{id}', 'Admin\JsonResponseController@detailItem')->name('json-item.show');

    // Detail user on JSON
    Route::get('/user-json/{id}', 'Admin\JsonResponseController@detailUser')->name('json-user.show');

    // Item borrower approved button
    Route::put('/item-approved/{id}', 'Admin\JsonResponseController@approvedItemBorrower')->name('json-item.approved');

    // Item borrower not approve button
    Route::put('/item-not-approved/{id}', 'Admin\JsonResponseController@notApproveItemBorrower')->name('json-item.not-approved');
});

Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Mahasiswa\DashboardController@index')->name('dashboard.index');

    // Menu
    Route::resource('/item-borrowers-history', 'Mahasiswa\ItemBorrowerHistoryController');

    // Store JSON
    Route::post('/item-borrowers-json', 'Mahasiswa\JsonResponseController@store')->name('json-item-borrowers.store');

    Route::resource('/item-borrow', 'Mahasiswa\ItemBorrowController');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
