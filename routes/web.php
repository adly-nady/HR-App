<?php

use App\Http\Controllers\Attendance\AttendanceControll;
use App\Http\Controllers\Employees\EmployeesController;
use App\Http\Controllers\GateWay\GateWayController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Machine_config\Machine_configController;
use App\Http\Controllers\Machine_config\ShiftController;
use App\Http\Controllers\Salaries\SalariesController;
use App\Http\Controllers\Users\UsersControll;
use App\Http\Controllers\ZktecoController;
use Illuminate\Support\Facades\Auth;

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
//______________________________________ Zkteco App Config
// Route::get('/zkteco', function () {
//     return view('zkteco');
// })->middleware('auth');

Route::get('/zkteco', [ZktecoController::class, 'get_data']);
Route::get('/zkteco-test', [ZktecoController::class, 'test'])->name('zkteco');

//_______________________________________________________

Route::get('/', function () {
    return view('backend.Dashbord');
})->name('Dashboard')->middleware('auth');

Route::get('/Dashboard', function () {
    return view('backend.Dashbord');
})->middleware('auth');
// Route::get('/', [DashboardController::class, 'laravel']);



Route::group(['prefix' => 'HR', 'middleware' => 'verified'], function () {
    //--------------------------------------------------------------------------------------------------------   Machine_config
    Route::get('/Machine_config', [Machine_configController::class, 'index'])->name('Machine_config.index');
    Route::post('/Machine_config/save', [Machine_configController::class, 'save'])->name('Machine_config.save');



    //--------------------------------------------------------------------------------------------------------   Shift
    Route::get('/Shift', [ShiftController::class, 'index'])->name('Shift.index');
    Route::post('/Shift/update1', [ShiftController::class, 'update1'])->name('Shift1.update');
    Route::post('/Shift/update2', [ShiftController::class, 'update2'])->name('Shift2.update');
    Route::post('/Shift/update3', [ShiftController::class, 'update3'])->name('Shift3.update');

    Route::get('/department', [EmployeesController::class, 'department_view'])->name('department_view');
    Route::post('/department/save', [EmployeesController::class, 'save'])->name('department_save');
    Route::get('/department/delete/{id}', [EmployeesController::class, 'delete'])->name('department_delete');
    Route::get('/department/GetData', [EmployeesController::class, 'GetData'])->name('department_GetData');

    Route::get('/qualifications', [EmployeesController::class, 'qualifications_view'])->name('qualifications_view');
    Route::post('/qualifications/save', [EmployeesController::class, 'qualifications_save'])->name('qualifications_save');
    Route::get('/qualifications/delete/{id}', [EmployeesController::class, 'qualifications_delete'])->name('qualifications_delete');
    Route::get('/qualifications/GetData', [EmployeesController::class, 'qualifications_GetData'])->name('qualifications_GetData');

    Route::get('/Employee', [EmployeesController::class, 'Employee_view'])->name('Employee_view');
    Route::post('/Employee/save', [EmployeesController::class, 'Employee_save'])->name('Employee_save');

    Route::get('/All_Employee', [EmployeesController::class, 'All_Employee'])->name('All_Employee');
    Route::get('/All_Employee/delete/{id}', [EmployeesController::class, 'delete_Employee'])->name('delete_Employee');
    Route::get('/All_Employee/Select/{id}', [EmployeesController::class, 'Employee_Select'])->name('Employee_Select');

    Route::get('/Attendance', [AttendanceControll::class, 'Attendance_view'])->name('Attendance_view');
    Route::post('/Attendance/search', [AttendanceControll::class, 'Attendance_search'])->name('Attendance_search');


    Route::post('/add_day_off', [AttendanceControll::class, 'add_day_off'])->name('add_day_off');
    Route::post('/click_add_day_out', [AttendanceControll::class, 'click_add_day_out'])->name('click_add_day_out');

    //--------------------------------------------------------------------------------------------------------   Machine_config
    Route::get('/Days-Off-Statement', [Machine_configController::class, 'display_Days_Off_Statement'])->name('display_Days_Off_Statement');
    Route::get('/Work-Outside-Statement', [Machine_configController::class, 'display_Work_Outside_Statement'])->name('display_Work_Outside_Statement');

    Route::get('/list_of_Days_Off_Statement', [Machine_configController::class, 'list_of_Days_Off_Statement'])->name('list_of_Days_Off_Statement');
    Route::get('/list_of_Work_Outside_Statement', [Machine_configController::class, 'list_of_Work_Outside_Statement'])->name('list_of_Work_Outside_Statement');

    Route::post('/Days-Off-Statement/delete-item', [Machine_configController::class, 'delete_Days_Off_Statement'])->name('delete_Days_Off_Statement');
    Route::post('/Work-Outside-Statement/delete-item', [Machine_configController::class, 'delete_Work_Outside_Statement'])->name('delete_Work_Outside_Statement');

    Route::post('/search_in_Days_Off_Statement', [Machine_configController::class, 'search_in_Days_Off_Statement'])->name('search_in_Days_Off_Statement');
    Route::post('/search_in_Work_Outside_Statement', [Machine_configController::class, 'search_in_Work_Outside_Statement'])->name('search_in_Work_Outside_Statement');

    Route::post('/get_users', [Machine_configController::class, 'get_users'])->name('get_users');

    //--------------------------------------------------------------------------------------------------------   Salaries
    Route::get('/Employees_Salaries_view', [SalariesController::class, 'Employees_Salaries_view'])->name('Employees_Salaries_view');

    Route::post('/Employees_Salaries_view/add_salary_deduction_reward', [SalariesController::class, 'add_salary_deduction_reward'])->name('add_salary_deduction_reward');
    Route::post('/Employees_Salaries_view/add_salary_borrow', [SalariesController::class, 'add_salary_borrow'])->name('add_salary_borrow');

    Route::post('/Employees_Salaries_view/Search', [SalariesController::class, 'Employees_Salaries_Search'])->name('Employees_Salaries.Search');

    Route::get('/Salary_Deduction_Reward_View', [SalariesController::class, 'Salary_Deduction_Reward_View'])->name('Salary_Deduction_Reward_View');
    Route::get('/Salary_Deduction_Reward_View/{id}', [SalariesController::class, 'Salary_Deduction_Reward_Delete'])->name('Salary_Deduction_Reward_Delete');
    Route::post('/Salary_Deduction_Reward_View/Search', [SalariesController::class, 'Salary_Deduction_Reward_Search'])->name('Salary_Deduction_Reward_Search');

    Route::get('/Salary_Borrow_View', [SalariesController::class, 'Salary_Borrow_View'])->name('Salary_Borrow_View');
    Route::get('/Salary_Borrow_Delete/{id}', [SalariesController::class, 'Salary_Borrow_Delete'])->name('Salary_Borrow_Delete');
    Route::post('/Salary_Borrow_Search/Search', [SalariesController::class, 'Salary_Borrow_Search'])->name('Salary_Borrow_Search');

    //--------------------------------------------------------------------------------------------------------   GateWay

    Route::get('/GateWay_View', [GateWayController::class, 'index'])->name('GateWay.View');
    Route::post('/GateWay_View/insert', [GateWayController::class, 'insert'])->name('GateWay.insert');
    Route::get('/GateWay_View/delete/{id}', [GateWayController::class, 'delete'])->name('GateWay.delete');
    Route::post('/GateWay_View/Search', [GateWayController::class, 'Search'])->name('GateWay.Search');

    //--------------------------------------------------------------------------------------------------------   Users

    Route::get('/Users_View', [UsersControll::class, 'index'])->name('Users.View');
    Route::post('/Users_View/insert', [UsersControll::class, 'insert'])->name('Users.insert');
    Route::get('/Users_View/delete/{id}', [UsersControll::class, 'delete'])->name('Users.delete');














    // Route::group(['prefix' => 'Products', 'as' => 'Product.'], function () {search_in_Work_Outside_Statement
    //     // Route::resource('Product', ProductController::class);
    //     Route::get('/', [ProductController::class, 'index'])->name('index'); //Product.index
    //     Route::get('/create', [ProductController::class, 'create'])->name('create');
    //     Route::post('/store', [ProductController::class, 'store'])->name('store');
    //     Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    //     Route::post('/Update/{id}', [ProductController::class, 'Update'])->name('Update');
    //     Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy'); // Product.destroy
    // });
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
