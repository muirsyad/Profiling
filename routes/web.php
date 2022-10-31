<?php

use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\questionsController;

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

Route::get('/', [userController::class, 'index'])->name('login');
Route::post('/auth', [userController::class, 'auth'])->name('auth');
Route::post('/logout', [userController::class, 'logout'])->name('logout');
Route::get('/register', [userController::class, 'create'])->name('register');
//register by client
Route::get('/register/{name}', [userController::class, 'createcode'])->name('link');
Route::post('/Cadmin', [userController::class, 'Rstore'])->name('adminR');

//admin routes
Route::get('/admin/index', [adminController::class, 'index'])->name('ad_index');
Route::get('/admin/clients', [adminController::class, 'Chome'])->name('cHome');
Route::get('/admin/clients/create', [adminController::class, 'create'])->name('Ccreate');
Route::post('/admin/clients/create/store', [adminController::class, 'store'])->name('Cstore');
Route::get('/admin/clients/view', [adminController::class, 'view'])->name('Cview');
Route::get('/admin/clients/details/{clients}', [adminController::class, 'details'])->name('details');
Route::get('/admin/clients/details/{clients}/invite', [adminController::class, 'invite'])->name('invite');
Route::get('/admin/clients/delete/{clients}', [adminController::class, 'Cdelete'])->name('delete');
Route::get('/admin/clients/update/{clients}', [adminController::class, 'update'])->name('update');
Route::post('/admin/clients/change/{clients}', [adminController::class, 'change'])->name('update');
Route::get('/admin/questions', [adminController::class, 'vquest'])->name('vquest');
Route::get('/admin/profile', [adminController::class, 'profile'])->name('profile');


//cliet routes
Route::get('/registerC', [userController::class, 'create2'])->name('register2');
Route::get('/home', [questionsController::class, 'index'])->name('Qhome');
Route::get('/quiz', [questionsController::class, 'quiz'])->name('quiz');
Route::get('/Squiz', [questionsController::class, 'Squiz'])->name('Squiz');
Route::get('/quizzz', [questionsController::class, 'quiz2'])->name('qz');
Route::post('/storeQuiz', [questionsController::class, 'storQ'])->name('StoreQuiz');
Route::get('/results', [questionsController::class, 'results'])->name('results');
route::get('/dd',[questionsController::class,'pdf'])->name('pdf');

Route::post('/Cuser', [userController::class, 'Ustore'])->name('userR');

//email test
Route::get('/sendmail/{name}', [userController::class, 'sendMail'])->name('mail');
Route::post('/sentmail/{code}', [userController::class, 'sentMail'])->name('smail');
//random string
route::get('/code', function () {

    $random = Str::random(4);
    return view('random',[

        'random' => $random,
    ]);
});


//test pdf
Route::get('tpdf', [questionsController::class, 'tpdf']);

