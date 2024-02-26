<?php
use App\Models\Setting;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApkController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\UserManagement;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\AcceptedReportController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\HotlinesController;
use App\Http\Controllers\admin\GuidelinesController;
use App\Http\Controllers\admin\InitialReport;
use App\Http\Controllers\admin\RejectedReportController;
use App\Http\Controllers\admin\CompletedReportController;


use App\Http\Controllers\sector\HomeController;
use App\Http\Controllers\sector\SectorReportController;
use App\Http\Controllers\sector\ContactsController;
use App\Http\Controllers\sector\ProfileController;
use App\Http\Controllers\sector\SectorRejectedController;
use App\Http\Controllers\sector\SectorPendingReport;
use App\Http\Controllers\sector\SectorInitialReport;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DefaultHomeController;
use App\Http\Controllers\Notification;
use App\Http\Controllers\SettingsController;

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

    $aboutus = Setting::where('settings_id' , '1')->get();
    return view('welcome' , ['aboutus' => $aboutus]);
});

Route::get('/download/{filename}', [ApkController::class, 'download'] )->name('download.file');

Route::get('/home', [DefaultHomeController::class, 'index'])->middleware('auth')->name('home');
Route::patch('/passwordupdate' ,[PasswordController::class, 'updatePassword'])->name('password.update')->middleware('auth');



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
    Route::patch('/userverify/{user}', [UserManagement::class,'verifyuser'])->name('user.verify');
    Route::patch('/passchange/{user}', [UserManagement::class,'userchangepass'])->name('userchangepass');


    //For Reports
    Route::get('/activereports', [ReportController::class, 'index'])->name('reports');
    Route::get('/reports/{report}/show', [ReportController::class, 'show'])->name('reports.show');
    Route::patch('/reports/{report}', [ReportController::class, 'accept_report'])->name('reports.accept');
    Route::patch('destroy/reports/{report}', [ReportController::class, 'reject'])->name('reports.reject');
    
    //initial report
    Route::get('/initialreport', [InitialReport::class, 'index'])->name('initial_report');
    Route::post('/initialreport/store', [InitialReport::class, 'makereport'])->name('initialreport.store');

    //for accepted reports
    Route::get('/acceptedreports', [AcceptedReportController::class, 'index'])->name('accepted_reports'); 

    //For rejected Reports
    Route::get('/rejectedreports', [RejectedReportController::class, 'index'])->name('rejected_reports');
    Route::get('/rejectedreports/{report}/show', [RejectedReportController::class, 'show'])->name('rejected_reports.show');
    Route::delete('destroy/rejectedreports/{report}', [RejectedReportController::class, 'destroy'])->name('rejected_reports.delete');
    Route::patch('makeactive/rejectedreports/{report}', [RejectedReportController::class, 'makeActive'])->name('rejected_reports.makeactive');

    //Completed Reports
    Route::get('/completedreports', [CompletedReportController::class, 'index'])->name('completed.index');
    Route::get('/completed/{reports}/edit', [CompletedReportController::class, 'edit'])->name('completed.edit');

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
   
    //settings
    Route::get('settings', [SettingsController::class, 'settingsIndex'])->name('settings.index');
    Route::patch('/settings/updateAboutUs' ,[SettingsController::class, 'editAboutus'])->name('settings.updateAboutUs');
    Route::patch('/settings/LegalPolicies' ,[SettingsController::class, 'editLegalPolicies'])->name('settings.updateLegalPolicies');
});



// user/ default
Route::prefix('sector')->middleware(['auth','admin'])->group(function()
{
    Route::get('/dashboard', [HomeController::class, 'create'])->name('dashboard');
    Route::get('/profile' ,[ProfileController::class, 'show'])->name('edit_profile');
    Route::patch('/profile' ,[ProfileController::class, 'update']);

    // contacts
    Route::get('contacts', [ContactsController::class, 'index'])->name('contacts.index');
    Route::resource('contacts', ContactsController::class);
    Route::get('/contacts/{contact}/edit', [ContactsController::class, 'edit'])->name('contacts.edit');
    Route::patch('/contacts/{contact}', [ContactsController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');


    //pending reports
    Route::get('/activereports', [SectorPendingReport::class, 'index'])->name('pending_reports');
    Route::get('/reports/{report}/show', [SectorPendingReport::class, 'show'])->name('pendingreports.show');
    Route::patch('/reports/{report}', [SectorPendingReport::class, 'accept_report'])->name('pendingreports.accept');
    Route::patch('destroy/reports/{report}', [SectorPendingReport::class, 'reject'])->name('pendingreports.reject');

    //initial Report
    Route::get('/initialreport', [SectorInitialReport::class, 'index'])->name('sector_initial_report');
    Route::post('/sectorinitialreport/store', [SectorInitialReport::class, 'makereport'])->name('sector_initial_report.store');

    //accepted reports
    Route::get('/reports/{report}/show', [ReportController::class, 'show'])->name('sector-reports.show');
    Route::get('/acceptedreports', [SectorReportController::class, 'index'])->name('sector.reports');

    //rejected reports
    Route::get('/rejectedreports', [SectorRejectedController::class, 'index'])->name('sectorrejected_reports');
    Route::get('/rejectedreports/{report}/show', [SectorRejectedController::class, 'show'])->name('sectorrejected_reports.show');
    Route::delete('destroy/rejectedreports/{report}', [SectorRejectedController::class, 'destroy'])->name('sectorrejected_reports.delete');
    Route::patch('makeactive/rejectedreports/{report}', [SectorRejectedController::class, 'makeActive'])->name('sectorrejected_reports.makeactive');
});


Route::get('/verify/{token}/{email}', [AuthController::class, 'verifyAccount'])->name('verify_account');
Route::post('logout',[AuthController::class, 'destroy'])->middleware('auth')->name('logout');












