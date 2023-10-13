<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavedAccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard.index');
Route::get('ac_holder/dashboard',[UserController::class,'dashboard'])->name('dashboard.ac_holder');
Route::get('/',[AdminController::class,'home'])->name('home.homepage');




//Auth//
Route::get('login',[AuthController::class,'login'])->name('auth.login');
Route::post('user-login',[AuthController::class,'postlogin'])->name('user.login');

//Employee//
Route::get('student-account',[EmployeeController::class,'studentshow'])->name('employee.studentlist');
Route::get('current-account',[EmployeeController::class,'currentlist'])->name('employee.current');
Route::get('savings-account',[EmployeeController::class,'savingslist'])->name('employee.savings');
Route::get('salary-account',[EmployeeController::class,'salaryaccount'])->name('employee.salaryaccount');
Route::get('create',[AdminController::class,'add'])->name('employee.create');
Route::post('employee-store',[AdminController::class,'store'])->name('employee.store');
Route::get('profile',[EmployeeController::class,'profile'])->name('edit.profile');
Route::get('employee-list',[EmployeeController::class,'show'])->name('employee.list');
//Route::get('customer-list',[EmployeeController::class,'show'])->name('employee.list');
Route::get('punch-in',[EmployeeController::class,'punch'])->name('punch.employee');
Route::post('active-employee',[EmployeeController::class,'savetime'])->name('employee.attendance');
Route::get('attendance-list',[EmployeeController::class,'ShowAttendance'])->name('attendance.time');
Route::get('punch-out',[EmployeeController::class,'punchout'])->name('employee.punchout');
Route::get('log-out',[EmployeeController::class,'logout'])->name('user.logout');
Route::get('forgot-password',[EmployeeController::class,'forgotpassword'])->name('forgotpassword.employee');
Route::post('find-user',[EmployeeController::class,'getUser'])->name('find.user');
Route::get('set-pass/{id}',[EmployeeController::class,'newpass'])->name('setpass.employee');
Route::post('new-pass/{id}',[EmployeeController::class,'passUpdate'])->name('password.update');
Route::get('change-password/{id}',[EmployeeController::class,'ChangePassword'])->name('change.password');
Route::post('store-newpass/{id}',[EmployeeController::class,'storepass'])->name('store.password');
Route::get('Verified/{id}',[EmployeeController::class,'Verified'])->name('employee.Verified');
Route::get('transaction_verified/{id}',[EmployeeController::class,'approved'])->name('transaction.Verified');
Route::get('transaction_canceled/{id}',[EmployeeController::class,'canceled'])->name('transaction.canceled');
Route::get('transaction-request',[EmployeeController::class,'transactionRequest'])->name('transaction.request');
Route::get('transaction-done',[EmployeeController::class,'transactionDone'])->name('transaction.done');
Route::get('transaction-view/{id}',[EmployeeController::class,'transactionView'])->name('transaction.view');



//Admin//
Route::get('user-profile/{id}',[AdminController::class,'view'])->name('user.profile');
Route::post('update-profile/{id}',[AdminController::class,'userUpdate'])->name('userprofile.update');
Route::get('delete-user/{id}',[AdminController::class,'destroy'])->name('user.delete');
Route::get('delete-fund/{id}',[AdminController::class,'delete'])->name('fund.delete');
Route::get('profile/{id}',[AdminController::class,'profilefrom'])->name('profile');
Route::get('auth-profile',[AdminController::class,'authProfile'])->name('auth.profile');
Route::get('email-verification/{id}',[AdminController::class,'UserEmailVerification'])->name('useremail.verification');
Route::get('unverified-employee/{id}',[AdminController::class,'unverifiedEmployee'])->name('employee.unverified');
Route::get('salary-list',[AdminController::class,'salarylist'])->name('employee.salary');
Route::get('salary-generate',[AdminController::class,'salarystore'])->name('salary.store');
Route::get('attendance-details/{id}',[AdminController::class,'details'])->name('attendance.details');
Route::get('salary-table/{id}/{date}',[AdminController::class,'salarytable'])->name('salary.details');
Route::get('personal-view',[AdminController::class,'personalstatus'])->name('personal.salary');
Route::get('customers-list',[AdminController::class,'customerlist'])->name('customers.list');
Route::get('a_holder_request-list',[AdminController::class,'Request'])->name('a_holder_request.list');
Route::get('Add-bank',[AdminController::class,'addBank'])->name('add.bank');
Route::get('create-e_bank_branch',[AdminController::class,'createBranch'])->name('create.branch');
Route::get('bank-list',[AdminController::class,'BankList'])->name('bank.list');
Route::get('e_branch-list',[AdminController::class,'BranchList'])->name('branch.list');
Route::post('bank-save',[AdminController::class,'BankSave'])->name('bank.save');
Route::put('bank-update/{id}',[AdminController::class,'bankUpdate'])->name('bank.update');
Route::get('edit-bank/{id}',[AdminController::class,'editBank'])->name('bank.edit');
Route::post('e_branch-save',[AdminController::class,'branchSave'])->name('e_branch.save');

//User//
Route::get('student-form',[UserController::class,'studentform'])->name('student.form');
Route::get('salary-form',[HomeController::class,'salaryAccount'])->name('salary.account');
Route::get('current-from',[UserController::class,'currentFrom'])->name('current.form');
Route::get('savings-form',[UserController::class,'savings'])->name('savings.form');
Route::post('open-account',[UserController::class,'register'])->name('user.registration');
Route::get('our-features',[UserController::class,'features'])->name('our.features');
Route::get('deposit',[UserController::class,'depositFund'])->name('deposit');
Route::post('save-deposit',[UserController::class,'saveDeposit'])->name('save.deposit');
Route::get('Customer-report',[UserController::class,'CustomerReport'])->name('Customer.report');
Route::get('pay-bil',[UserController::class,'bil'])->name('pay.bil');
Route::get('mfs-transfer',[UserController::class,'mfs'])->name('mfs.transfer');
Route::get('own-transfer',[UserController::class,'own'])->name('own.transfer');
Route::get('other-transfer',[UserController::class,'other'])->name('other.transfer');
Route::get('single-transfer',[UserController::class,'single'])->name('single.transfer');
Route::get('cheque-book',[UserController::class,'request'])->name('cheque.book');
Route::post('book-request',[UserController::class,'storerequest'])->name('request.store');
Route::post('fund-transfer',[UserController::class,'transfer'])->name('fund.transfer');
Route::post('fund-save',[UserController::class,'fundSave'])->name('fund.save');
Route::get('request-list',[UserController::class,'chequeindex'])->name('request.list');
Route::get('request-delete/{id}',[UserController::class,'deleteindex'])->name('delete.list');


Route::resource('saved_accounts',SavedAccountController::class)->only('index','create','store','destroy');
