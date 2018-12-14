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


//rutas CRUD para los usuarios
Route::resource('users', 'UserController');



//crear ruta para el formulario de crear estudiantes nuevo
Route::get('create_estudiante', 'UserController@create_estudiante');
