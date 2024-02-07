<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\anoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Mail\MyTestMail;

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




Route::get('stateJoinORM', [anoController::class, 'JoinUsingORM']);






Route::get('FormData', [anoController::class, 'FormData']);
Route::get('/form', function () {
    return view('form');
});


Route::get('UserInfo', [anoController::class, 'getState2']);
Route::get('FillState', [anoController::class, 'FillState']);
Route::get('/state', function () {
    return view('state');
});




Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from test',
        'body' => 'This is for testing email using smtp'
    ];
    Mail::to('avinash94.sh@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is sent");
});

Route::get('send-mail2', function () {
    $details = [
        'title' => 'Mail from test',
        'body' => 'This is for testing email using smtp. Workers or Queue Example'
    ];
    Mail::to('avinash94.sh@gmail.com')->send(new \App\Mail\TestEmailSend($details));
    dd("Email is sent");
});











Route::get('/contact-form', [AuthController::class, 'sendMessage']);
Route::get('/contact', function () {
    return view('contact');
});



Route::group(['middleware' => ['CheckAuth', 'revalidate']], function () {

    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/studenthome', [AuthController::class, 'studenthome']);
});



Route::get('/facultyhome', function () {
    return view('facultyhome');
});




Route::post('/login-submit', [AuthController::class, 'createSignin']);
// Route::get('/login', function () {
//     return view('login');
// });


Route::get('/crudajax', function () {
    $user = DB::table('user_master')->get();
    return View::make('crudajax')->with('users', $user);
});
Route::get('samepageEditAjax', [anoController::class, 'samepageEditAjax']);
Route::get('samepageDeleteAjax', [anoController::class, 'samepageDeleteAjax']);
Route::get('samepageupdateajax', [anoController::class, 'samepageupdateajax']);



Route::get('/viewusers', function () {
    $user = DB::table('user_master')->get();
    return View::make('viewusers')->with('users', $user);
});
Route::get('deleteuser', [anoController::class, 'deleteuser']);
Route::get('edituser', [anoController::class, 'edituser']);
Route::post('update', [anoController::class, 'update']);




Route::get('/samepage', function () {
    $user = DB::table('user_master')->get();
    return View::make('samepage')->with('users', $user);
});
Route::post('samepageupdate', [anoController::class, 'samepageupdate']);
Route::get('samepageedit', [anoController::class, 'samepageedit']);
Route::get('samepagedelete', [anoController::class, 'samepagedelete']);





Route::get('/add', function () {
    return view('add');
});
Route::post('/add', [anoController::class, 'add']);


Route::get('/', function () {
    return view('home');
});


Route::get('/test', function () {
    return view('test');
});
Route::post('/getState', [anoController::class, 'getState']);
Route::post('/getDistrict', [anoController::class, 'getDistrict']);



Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/login', function () {
    return view('login');
    // dd("login");
});
Route::post('/login', [anoController::class, 'loginfun']);


Route::get('/register', function () {
    return view('register');
});
// Route::post('/register', [anoController::class, 'registerfun']);
Route::post('/register', [AuthController::class, 'customSignup']);


Route::get('/pricing', function () {
    return view('pricing');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
