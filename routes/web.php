<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
git remote add origin https://github.com/toros20/virtual.git
git push -u origin master
*/

Route::get('/', function () {
    return view('welcome');
});


//crear ruta para la seccion de listar estudiantes 
Route::get('/users/students', 'UserController@students')->name('users.students');
//crear ruta para el formulario de crear estudiantes nuevo
Route::get('/users/students/create', 'UserController@create_estudiante');

//rutas CRUD para los usuarios
Route::resource('users', 'UserController');

//rutas CRUD para las modalidades
Route::resource('modalities', 'ModalityController');

//rutas CRUD para los cursos
Route::resource('courses', 'CourseController');



//aqui van todas las rutas para el control de login, register, reset password, etc
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//Register the typical reset password routes for an application.
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//esta es la pgina a la que dirijira una vez que haga el login
Route::get('/home', 'HomeController@index')->name('home');
