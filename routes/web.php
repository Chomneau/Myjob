<?php
use App\User;
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

Route::get('/form', 'PagesController@form');
Route::post('/form', 'PagesController@store');

Auth::routes();
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::get('/findjob', 'PagesController@getFindJob');
Route::get('/postjob', 'PagesController@getPostjob');

//Route::get('/home', 'HomeController@index');
//Route::get('/home/profile', 'HomeController@profile')->name('home.profile');
//Route::post('/home/profile', 'HomeController@createProfile')->name('home.profile.submit');

Route::get('/home', 'HomeController@index')->name('home.profile');




Route::get('/home/job', 'HomeController@showJobForm')->name('home.jobform');
Route::post('/home/job', 'HomeController@createjob')->name('home.jobform.submit');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//user route controller
Route::get('/user/profile', 'ProfileController@index')->name('user.profile');
Route::post('/user/profile/update', 'ProfileController@update')->name('user.profile.update');


Route::resource('/user', 'ProfileController');

//build CV
Route::resource('/mycv', 'CvController');
Route::post('/mycv/update/{id}', 'CvController@update')->name('mycv.update');
Route::get('/mycv/delete/{id}', 'CvController@destroy')->name('mycv.delete');

//user education route

Route::resource('/education', 'UserEducationController');
Route::post('/education/update/{id}', 'UserEducationController@update')->name('education.update');
Route::get('/education/delete/{id}', 'UserEducationController@destroy')->name('education.delete');


//findjob
Route::get('/findjob', 'FindJobController@index')->name('findjob');






Route::prefix('admin')->group(function (){

    Route::get('/login', 'auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/postjob', 'AdminController@showPostjobForm')->name('admin.postjob');
    Route::post('/postjob', 'AdminController@postjob')->name('admin.postjob.submit');


    //view category
//    Route::get('/showcategory', 'CategoryController@showCategory')->name('admin.showcategory');
//    Route::get('/category', 'CategoryController@showCategoryForm')->name('admin.category');
//    Route::post('/category', 'CategoryController@store')->name('admin.showcategory.submit');
    Route::resource('/category', 'CategoryController');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');


// industry type route controller
    Route::resource('/industry', 'IndustryTypeController');
    Route::get('/industry/delete/{id}', 'IndustryTypeController@destroy')->name('industry.delete');
    Route::get('/industry/edit/{id}', 'IndustryTypeController@edit')->name('industry.edit');
    Route::post('/industry/update/{id}', 'IndustryTypeController@update')->name('industry.update');

// job location
    Route::resource('/location', 'LocationController');
    Route::get('/location/edit/{id}', 'LocationController@edit')->name('location.edit');
    Route::post('/location/update/{id}', 'LocationController@update')->name('location.update');
    Route::get('/location/delete/{id}', 'LocationController@destroy')->name('location.delete');
// job employee Size
    Route::resource('/employeeSize', 'EmployeeSizeController');
    Route::get('/employeeSize/edit/{id}', 'EmployeeSizeController@edit')->name('employeeSize.edit');
    Route::post('/employeeSize/update/{id}', 'EmployeeSizeController@update')->name('employeeSize.update');
    Route::get('/employeeSize/delete/{id}', 'EmployeeSizeController@destroy')->name('employeeSize.delete');
// job company type
    Route::resource('/companyType', 'CompanyTypeController');
    Route::get('/companyType/edit/{id}', 'CompanyTypeController@edit')->name('companyType.edit');
    Route::post('/companyType/update/{id}', 'CompanyTypeController@update')->name('companyType.update');
    Route::get('/companyType/delete/{id}', 'CompanyTypeController@destroy')->name('companyType.delete');

    //create new job
    Route::resource('/createjob', 'JobController');

    Route::post('/createjob/postjob/{id}', 'JobController@store')->name('createjob.postjob');

    //company controller
    Route::resource('/company', 'CompanyController');
    Route::get('/company/profile/{id}', 'CompanyController@show')->name('admin.company.profile');
    Route::post('/company/update/{id}', 'CompanyController@update')->name('company.update');

    Route::resource('/company/note', 'NoteController');
    Route::post('/company/note/{id}', 'NoteController@store')->name('company.note');



    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//    //Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');



//    // Password reset routes
//    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');



});




