<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// OFFICER CONTROLLER
use App\Http\Controllers\officer\OfficerDashboardController;
use App\Http\Controllers\officer\PreMembershipApplicationController;
use App\Http\Controllers\officer\ReportsMembershipApplicationController;
use App\Http\Controllers\officer\PreLoanApplicationController;
use App\Http\Controllers\officer\ReportsLoanApplicationController;
use App\Http\Controllers\MembershipApplicationController;
use App\Http\Controllers\officer\ProductLoanController;
use App\Http\Controllers\officer\LoanAppController;
use App\Http\Controllers\officer\MembershipInfoController;
// ADMIN CONTROLLER
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ApproveMembershipApplicationController;
use App\Http\Controllers\admin\ApproveLoanApplicationController;
use App\Http\Controllers\admin\LoanApplicationReportsController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\MemberListController;
use App\Http\Controllers\admin\PreApprovedMembershipController;
use App\Http\Controllers\admin\SettledLoanReportsController;
// CLIENT CONTROLLER
use App\Http\Controllers\MembershipReportsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExpressLoanAppController;
use App\Http\Controllers\RegularSpecialLoanController;
use App\Http\Controllers\client\LoanApplicationController;
use App\Http\Controllers\client\LadLoanController;
use  App\Http\Controllers\client\ExpressLoanController;
use App\Http\Controllers\client\RegularLoanController;
use  App\Http\Controllers\client\SpecialLoanController;
use  App\Http\Controllers\client\ApplyLoanController;


//use App\Http\Controllers\LoanHistoryController;
use App\Http\Controllers\PreSeminarController;
use App\Http\Controllers\client\ClientDashboardController;
use App\Http\Controllers\client\LoanHistoryController;
use App\Http\Controllers\client\ActiveLoanController;
use App\Http\Controllers\client\ExpressAmortController;
use App\Http\Controllers\client\ExpressPartialAmortController;
use App\Http\Controllers\client\ProfileController;
use App\Http\Controllers\client\SpecialAmortController;
use App\Http\Controllers\client\SpecialPartialAmortController;
use App\Http\Controllers\officer\DeclineLoanController;
// use App\Http\Controllers\admin\DashboardController;
// use App\Http\Controllers\admin\MembershipController;
// use App\Http\Controllers\admin\LoanController;
// use App\Http\Controllers\admin\MemberController;
// use App\Http\Controllers\officer\PreMembershipApplicationController;
// use App\Http\Controllers\officer\MembershipAppController;
// use App\Http\Controllers\officer\OfficerDashboardController;


// use App\Http\Controllers\client\MembershipController;

use App\Http\Controllers\PracticeController;



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

Route::middleware(['auth', 'isAdmin'])->group(function() {

  Route::resource('/admin/dashboard', AdminDashboardController::class);
  Route::resource('/admin/membership', ApproveMembershipApplicationController::class);
  Route::resource('/admin/approved-membership', MembershipReportsController::class);
  Route::resource('/admin/loan_app', ApproveLoanApplicationController::class);
  Route::resource('/admin/approved-loans', LoanApplicationReportsController::class);
  Route::resource('/admin/member-list', MemberListController::class);
  Route::resource('/admin/accounts', AccountController::class);
  Route::resource('/pre-membership', PreApprovedMembershipController::class);
  Route::resource('/admin/settled-loans', SettledLoanReportsController::class);


});

Auth::routes();
// Route::view("/home", "client.home");
Route::view("/regular-special-loan-form", "client.regular-special-loan-form");
Route::view("/express-loan-form", "client.express-loan-form");
Route::view('/regular-loans', 'client.regular-loans');
Route::view('/special-loans', 'client.special-loans');
Route::view('/express-loans', 'client.express-index');

Route::view('/form', 'client.membership-application');
//Route::view('/about-us', 'client.about-us');
//Route::view('/membership-information', 'client.membership-information');
Route::view('/officer/loan', 'officer.loan');
Route::view('/loans', 'client.loans');
Route::view('/officer/pre-approved-loans', 'officer.pre-approved-loans');
Route::view('/admin/member', 'admin.member');
Route::view('/loan-history', 'client.loan-history');
Route::view('/pre_seminar', 'client.pre_seminar');
Route::resource('/membership-application', MembershipApplicationController::class);
Route::resource('/express-loan-form', ExpressLoanAppController::class);
Route::resource('/regular-special-loan-form', RegularSpecialLoanController::class);
Route::resource('/loan-history', LoanHistoryController::class);
Route::resource('/home', PreSeminarController::class);
Route::view('/regular-loans-information', 'client.loan.regular.regular-loans-information');
Route::view('/LAD-loans-information', 'client.loan.loan_against_deposit.lad-loans-information');
Route::view('/express-loans-information','client.loan.express.express-loans-information');
Route::view('/special-loans-information','client.loan.special.special-loans-information');

Route::resource('/express-loan-application', ExpressLoanController::class);
Route::resource('/lad-loan-application', LadLoanController::class);
Route::resource('/regular-loan-application', RegularLoanController::class);
Route::resource('/special-loan-application', SpecialLoanController::class);


// client
Route::middleware(['auth', 'isClient'])->group(function() {
  Route::resource('/client/dashboard', ClientDashboardController::class);
  Route::resource('/client/loan-history', LoanHistoryController::class);
  Route::resource('/client/active-loan', ActiveLoanController::class);
  Route::view('/express-loans', 'client.loan.express.express-index');
  Route::resource('/profile', ProfileController::class);
  Route::resource('/apply-loan', ApplyLoanController::class);
  Route::resource('/loan-application', LoanApplication::class);
  Route::resource('/express_amort', ExpressAmortController::class);
  Route::resource('/express_partial_amort', ExpressPartialAmortController::class);
  Route::resource('/regular_special_partial_amort', SpecialPartialAmortController::class);
  Route::resource('/regular_special_amort', SpecialAmortController::class);
});


//offcer
Route::middleware(['auth', 'isOfficer'])->group(function() {
  Route::resource('/officer/dashboard', OfficerDashboardController::class);
  Route::resource('/officer/membership-application', PreMembershipApplicationController::class);
  Route::resource('/officer/pre-approved-membership', ReportsMembershipApplicationController::class);
  Route::resource('/officer/loan', PreLoanApplicationController::class);
  Route::resource('/officer/pre-approved-loans', ReportsloanApplicationController::class);
  Route::resource('/product-loans', ProductLoanController::class);
  Route::resource('/membership_info', MembershipInfoController::class);
  Route::resource('/loan_application', LoanAppController::class);
  Route::resource('/officer/decline-loan', DeclineLoanController::class);
 
  // Route::get('/officer/{id}', [MembershipInfoController::class, 'show']);
  // Route::get('/officer/membership_info/{id}', 'MembershipInfoController@show')->name('displayMembershipApplication');

});

//Admin

Route::resource('/registration', RegistrationController::class);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Guest
Route::view('/', 'client.home.home-index');
Route::view('about-us', 'client.about-us.about-us-index');
Route::view('membership-information', 'client.membership.membership-information.mem-info-index');
Route::view('membership-application-form', 'client.membership.membership-application-form.mem-app-form-index');
Route::view('seminar-index', 'client.online_seminar.seminar-index');
Route::view('contact-us', 'client.contact-us.contact-us-index');
Route::resource('loan-application', LoanApplicationController::class);
