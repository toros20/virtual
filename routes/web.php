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
    return view('login');
});


//crear ruta para la seccion de listar students 
Route::get('/users/students', 'UserController@students')->name('users.students');
//crear ruta para la seccion de listar teachers 
Route::get('/users/teachers', 'UserController@teachers')->name('users.teachers');
//crear ruta para el formulario de crear students nuevos
Route::get('/users/students/create', 'UserController@create_estudiante')->name('users.students.create');
//crear ruta para el formulario de crear teachers nuevos
Route::get('/users/teachers/create', 'UserController@create_teacher')->name('users.teachers.create');



//crear ruta para la seccion de listar cursos segun modalidad seleccionada 
Route::post('ajax/coursesbymodalityid', 'UserController@coursesbymodalityid');

//crear ruta para la seccion de listar secciones segun curso seleccionado 
Route::post('ajax/sectionsbycoursesid', 'UserController@sectionsbycoursesid');

//crear ruta para la seccion de listar clases segun curso seleccionado 
Route::post('ajax/clasesbycoursesid', 'UserController@clasesbycoursesid');

//crear ruta para la seccion de listar clases segun modalidad seleccionada 
Route::post('ajax/clasesbymodalityid', 'UserController@clasesbymodalityid');

//crear ruta para la pubñicacion de posts por seccion 
Route::post('ajax/post_in_section', 'UserController@post_in_section');




//rutas CRUD para los users
Route::resource('users', 'UserController');

//rutas CRUD para las modalities
Route::resource('modalities', 'ModalityController');

//rutas CRUD para los courses
Route::resource('courses', 'CourseController');

//rutas CRUD para las clases
Route::resource('clases', 'ClaseController');

//rutas CRUD para las enrollments
Route::resource('enrollments', 'EnrollmentController');

//rutas CRUD para las sectioncourses
Route::resource('sectioncourses', 'SectioncourseController');

//rutas CRUD para las clasecourses
Route::resource('clasecourses', 'ClasecourseController');

//rutas CRUD para las assignments
Route::resource('assignments', 'AssignmentController');


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

//esta es la ruta para el panel de student despues de hacer login exitosamente
Route::get('students/panel/{id}', 'StudentController@students_panel')->name('students_panel/{id}');
//esta es la ruta para el panel de teachers despues de hacer login exitosamente
Route::get('teachers/panel/{id}', 'TeacherController@teachers_panel')->name('teachers_panel/{id}');