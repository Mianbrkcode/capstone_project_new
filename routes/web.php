<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\UserManagement;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\AcceptedReportController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\HotlinesController;
use App\Http\Controllers\admin\GuidelinesController;

use App\Http\Controllers\sector\HomeController;
use App\Http\Controllers\sector\SectorReportController;
use App\Http\Controllers\sector\ContactsController;
use App\Http\Controllers\sector\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DefaultHomeController;
use App\Http\Controllers\ContactTesting;

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

Route::get('/testing', function () {
    return view('auth.testing');
});






Route::get('/home', [DefaultHomeController::class, 'index'])->middleware('auth')->name('home');
Route::patch('/passwordupdate' ,[PasswordController::class, 'updatePassword'])->name('password.update')->middleware('auth');



// Route::middleware('guest')->group(function () 
// {
//     Route::get('register', [RegisteredUserController::class, 'create'])
//                 ->name('register');

//     Route::post('register', [RegisteredUserController::class, 'store']);
//     Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

//     Route::post('login', [AuthenticatedSessionController::class, 'store']);
// });
// Route::get('/verify/{token}/{email}', [RegisteredUserController::class, 'verifyAccount'])->name('verify_account');
// // Route::post('logout',[ AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');



Route::middleware('guest')->group(function()
{
    //For Authentication
    Route::get('forgotpassword', [AuthController::class, 'forgotpasswordpage'])->name('forgotpassword');
    Route::post('forgotpassword', [AuthController::class, 'forgotpassword']);
    Route::get('register', [AuthController::class, 'registerpage'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'loginpage'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

});


// Admin
Route::prefix('admin')->middleware(['auth','superadmin'])->group(function()

{

    Route::get('/dashboard', [AdminHomeController::class, 'create'])->name('admin_dashboard');   
    Route::get('/profile' ,[AdminProfileController::class, 'show'])->name('admin_profile');
    Route::patch('/editprofile' ,[AdminProfileController::class, 'updateInformation'])->name('admin_editprofile');
    

    //for User Management
    Route::resource('users', UserManagement::class);
    Route::post('/delete-user', [UserManagement::class,'destroy']);
    Route::patch('/passreset/{user}', [UserManagement::class,'resetpassword'])->name('mail.passreset');
    Route::patch('/passchange/{user}', [UserManagement::class,'userchangepass'])->name('userchangepass');


    //For Reports
    Route::get('/activereports', [ReportController::class, 'index'])->name('reports');
    Route::post('/reports/delete-report', [ReportController::class,'destroy']);
    Route::get('/reports/{report_id}', [ReportController::class, 'show'])->name('reports.show');
    
    //accepted reports
    Route::get('/acceptedreports', [AcceptedReportController::class, 'index'])->name('accepted_reports'); 
    //contacts
    Route::get('hotlines', [HotlinesController::class, 'index'])->name('hotlines.index');
    Route::resource('hotlines', HotlinesController::class);
    Route::get('/hotlines/{hotline}/edit', [HotlinesController::class, 'edit'])->name('hotlines.edit');
    Route::patch('/hotlines/{hotline}', [HotlinesController::class, 'update'])->name('hotlines.update');
    Route::delete('/hotlines/{hotline}', [HotlinesController::class, 'destroy'])->name('hotlines.destroy');
    
    //guidelines
    Route::get('/guidelines', [GuidelinesController::class, 'index'])->name('guidelines.index');
    Route::post('/store-guidelines', [GuidelinesController::class, 'storeGuidelines'])->name('guidelines.store');
    Route::get('/guidelines/{guidelines}/edit', [GuidelinesController::class, 'edit'])->name('guidelines.edit');
    Route::post('/guidelines/{guidelinesID}', [GuidelinesController::class, 'updateGuidelines'])->name('guidelines.update');
    Route::delete('admin/guidelines/{guidelinesID}', [GuidelinesController::class, 'destroy'])->name('guidelines.destroy');
    
});



// user/ default
Route::prefix('sector')->middleware(['auth','admin'])->group(function()
{
    Route::get('/dashboard', [HomeController::class, 'create'])->name('dashboard');
    Route::get('/profile' ,[ProfileController::class, 'show'])->name('edit_profile');
    Route::patch('/profile' ,[ProfileController::class, 'update']);

    // contacts
    Route::get('/contacts', [ContactsController::class, 'index'])->name('sector.contacts');

    //reports
    Route::get('/acceptedreports', [SectorReportController::class, 'index'])->name('sector.reports');
});


Route::get('/verify/{token}/{email}', [AuthController::class, 'verifyAccount'])->name('verify_account');
Route::post('logout',[AuthController::class, 'destroy'])->middleware('auth')->name('logout');












