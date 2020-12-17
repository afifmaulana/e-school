<?php

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
    return view('auth.login');
});

//Route User
Route::get('/user-login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('/user-login', 'Auth\LoginController@login')->name('user.login.submit');
Route::post('/user-register', 'Auth\RegisterController@store')->name('user.register.submit');
Route::get('/user-logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

//Route Teacher
Route::group(['prefix' => 'teacher'], function (){
    Route::get('index','TeacherController@index')->name('teacher.index');
    Route::get('create','TeacherController@create')->name('teacher.create');
    Route::post('store','TeacherController@store')->name('teacher.store');
    Route::get('edit/{id}','TeacherController@edit')->name('teacher.edit');
    Route::patch('edit/{id}/update','TeacherController@update')->name('teacher.update');
    Route::get('destroy/{id}','TeacherController@destroy')->name('teacher.destroy');
});

//Route Students
Route::group(['prefix' => 'student'], function (){
    Route::get('index','StudentController@index')->name('student.index');
    Route::get('create','StudentController@create')->name('student.create');
    Route::post('store','StudentController@store')->name('student.store');
    Route::get('edit/{id}','StudentController@edit')->name('student.edit');
    Route::patch('edit/{id}/update','StudentController@update')->name('student.update');
    Route::get('destroy/{id}','StudentController@destroy')->name('student.destroy');
});

//Route Classroom
Route::group(['prefix' => 'classroom'], function (){
    Route::get('index','ClassroomController@index')->name('classroom.index');
    Route::get('create','ClassroomController@create')->name('classroom.create');
    Route::post('store','ClassroomController@store')->name('classroom.store');
    Route::get('edit/{id}','ClassroomController@edit')->name('classroom.edit');
    Route::patch('edit/{id}/update','ClassroomController@update')->name('classroom.update');
    Route::get('destroy/{id}','ClassroomController@destroy')->name('classroom.destroy');
    Route::get('exportpdf', 'ClassroomController@exportpdf')->name('classroom.pdf');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


