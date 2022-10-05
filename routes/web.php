<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
  
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
    return view('welcome');
});
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminhome'])->name('admin.home');
    

    Route::get('/admin/formkota', [HomeController::class, 'adminformkota'])->name('admin.forminputkota');
    Route::get('/admin/kota', [HomeController::class, 'store'])->name('kota.store');
    Route::get('/admin/datakota', [HomeController::class, 'datakota'])->name('kota.datakota');
    Route::delete('/admin/kotahapus/{id}', [HomeController::class, 'kotadestroy']);
    Route::get('/admin/kotaedit/{id}', [HomeController::class, 'editkota'])->name('kota.edit');
    Route::put('/admin/updatekota/{id}', [HomeController::class, 'updatekota'])->name('kota.update');

    Route::get('/admin/kec', [HomeController::class, 'kec'])->name('k.kec');
    Route::get('/admin/kecinput', [HomeController::class, 'kecstore'])->name('kec.kec');
    Route::get('/admin/datakec', [HomeController::class, 'datakec'])->name('kec.datakec');
    Route::get('/admin/kecedit/{id}', [HomeController::class, 'editkec'])->name('kec.edit');
    Route::put('/admin/updatekec/{id}', [HomeController::class, 'updatekec'])->name('kec.update');
    Route::delete('/admin/kechapus/{id}', [HomeController::class, 'kecdestroy']);

    Route::get('/admin/produsen', [HomeController::class, 'produsen'])->name('kec.produsen');
    Route::get('/admin/produseninput', [HomeController::class, 'produsenstore'])->name('produsen.produsenstore');
    Route::get('/admin/dataprodusen', [HomeController::class, 'dataprodusen'])->name('p.dataprodusen');
    Route::get('/admin/produsenedit/{id}', [HomeController::class, 'editprodusen'])->name('produsen.edit');
    Route::put('/admin/updateprodusen/{id}', [HomeController::class, 'updateprodusen'])->name('produsen.update');
    Route::delete('/admin/produsenhapus/{id}', [HomeController::class, 'produsendestroy']);

    Route::get('/admin/detail', [HomeController::class, 'detailjamu'])->name('jamu.detailjamu');
    Route::get('/admin/detailinput', [HomeController::class, 'detailstore'])->name('detail.detailstore');
    Route::get('/admin/datadetail', [HomeController::class, 'datadetail'])->name('d.datadetail');
    Route::delete('/admin/detailjamuhapus/{id}', [HomeController::class, 'detailjamudestroy']);
    Route::put('/admin/updatedetailjamu/{id}', [HomeController::class, 'updatedetailjamu'])->name('detailjamu.update');
    Route::get('/admin/detailjamuedit/{id}', [HomeController::class, 'editdetailjamu'])->name('detailjamu.edit');

    Route::get('/admin/jamu', [HomeController::class, 'jamu'])->name('j.jamu');
    Route::get('/admin/jamuinput', [HomeController::class, 'jamustore'])->name('jamu.jamustore');
    Route::get('/admin/datajamu', [HomeController::class, 'datajamu'])->name('j.datajamu');
    Route::delete('/admin/jamuhapus/{id}', [HomeController::class, 'jamudestroy']);
    Route::put('/admin/updatejamu/{id}', [HomeController::class, 'updatejamu'])->name('jamu.update');
    Route::get('/admin/jamuedit/{id}', [HomeController::class, 'editjamu'])->name('jamu.edit');

    Route::get('/admin/agen', [HomeController::class, 'agen'])->name('kec.agen');
    Route::get('/admin/dataagen', [HomeController::class, 'dataagen'])->name('p.dataagen');

});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
 