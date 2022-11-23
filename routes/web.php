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
Route::post('/Cadmin', [userController::class, 'Rstore'])->name('adminR')->middleware('auth');

//admin routes
Route::get('/admin/index', [adminController::class, 'index'])->name('ad_index')->middleware('auth');
Route::get('/admin/clients', [adminController::class, 'Chome'])->name('cHome')->middleware('auth');
Route::get('/admin/clients/create', [adminController::class, 'create'])->name('Ccreate')->middleware('auth');
Route::post('/admin/clients/create/store', [adminController::class, 'store'])->name('Cstore')->middleware('auth');
Route::get('/admin/clients/view', [adminController::class, 'view'])->name('Cview')->middleware('auth');
Route::get('/admin/clients/details/{clients}', [adminController::class, 'details'])->name('details')->middleware('auth');
Route::get('/admin/clients/details/{clients}/invite', [adminController::class, 'invite'])->name('invite')->middleware('auth');
Route::get('/admin/clients/delete/{clients}', [adminController::class, 'Cdelete'])->name('delete')->middleware('auth');
Route::get('/admin/clients/update/{clients}', [adminController::class, 'update'])->name('update')->middleware('auth');
Route::post('/admin/clients/change/{clients}', [adminController::class, 'change'])->name('update')->middleware('auth');
Route::get('/admin/questions', [adminController::class, 'vquest'])->name('vquest')->middleware('auth');
Route::get('/admin/profile', [adminController::class, 'profile'])->name('profile')->middleware('auth');
route::get('/admin/templates', [adminController::class, 'templates'])->name('template');
route::get('/admin/templates/individual', [adminController::class, 'indTemplate'])->name('indTemp');
Route::post('/admin/templates/individual/update', [adminController::class, 'uptemplate'])->name('tempstore')->middleware('auth');

route::get('/admin/templates/group', [adminController::class, 'grpTemplate'])->name('grpTemp');




//cliet routes
Route::get('/registerC', [userController::class, 'create2'])->name('register2');
Route::get('/home', [questionsController::class, 'index'])->name('Qhome')->middleware('auth');
Route::get('/quiz', [questionsController::class, 'quiz'])->name('quiz')->middleware('auth');
Route::get('/Squiz', [questionsController::class, 'Squiz'])->name('Squiz')->middleware('auth');
Route::get('/quizzz', [questionsController::class, 'quiz2'])->name('qz')->middleware('auth');
Route::post('/storeQuiz', [questionsController::class, 'storQ'])->name('StoreQuiz')->middleware('auth');
Route::get('/results', [questionsController::class, 'results'])->name('results')->middleware('auth');
Route::get('/results2', [questionsController::class, 'results2'])->name('results2')->middleware('auth');
route::get('/dd',[questionsController::class,'pdf'])->name('pdf')->middleware('auth');
//ver 2 pdf
route::get('/pdf2',[questionsController::class,'inv2'])->name('inv2')->middleware('auth');

Route::post('/Cuser', [userController::class, 'Ustore'])->name('userR')->middleware('auth');

//email test
Route::get('/sendmail/{name}', [userController::class, 'sendMail'])->name('mail')->middleware('auth');
Route::post('/sentmail/{code}', [userController::class, 'sentMail'])->name('smail')->middleware('auth');
//random string
route::get('/code', function () {

    $random = Str::random(4);
    return view('random',[

        'random' => $random,
    ]);
});


//test pdf
//indivifual report
Route::get('tpdf', [questionsController::class, 'tpdf'])->name('dlpdf')->middleware('auth');

//group report
Route::get('gpdf/{clients}', [questionsController::class, 'Gpdf'])->name('Greport')->middleware('auth');

Route::get('vtpdf', [questionsController::class, 'vtpdf'])->middleware('auth');

