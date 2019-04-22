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
    return view('auth/login');
});


//crear ruta para la seccion de listar students 
Route::get('/users/students', 'UserController@students')->name('users.students');
//crear ruta para la seccion de listar teachers 
Route::get('/users/teachers', 'UserController@teachers')->name('users.teachers');
//crear ruta para el formulario de crear students nuevos
Route::get('/users/students/create', 'UserController@create_estudiante')->name('users.students.create');
//crear ruta para el formulario de crear teachers nuevos
Route::get('/users/teachers/create', 'UserController@create_teacher')->name('users.teachers.create');
//crear ruta para la seccion de cambiar password, muestra el form
Route::get('/users/password/{user_id}/edit', 'UserController@password_edit')->name('users.password_edit');
//Crear ruta para la seccion de actualizar el password, metodo update
Route::put('/users/password/{user_id}', 'UserController@password_update')->name('users.password_update');

//Route::get('/users/tablas/{course_id}/{section} ', 'UserController@tablas')->name('users.tablas');


//ruta para mostrar la seccion de boletas de calificaciones
Route::get('/users/boletas ', 'UserController@boletas')->name('users.boletas');

//ruta para mostrar la seccion de boletas de calificaciones
Route::get('/users/panel/{user_id} ', 'UserController@panel')->name('users_panel/{user_id}');



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

//crear ruta para la pubñicacion de posts por seccion 
Route::post('ajax/filtrar_msj_byteacher', 'UserController@filtrar_msj_byteacher');

//crear ruta para mostrar la caja de comentar 
Route::post('ajax/div_comentar', 'UserController@div_comentar');

//crear ruta para mostrar recibir el mensaje
Route::post('ajax/enviar_comentario', 'UserController@enviar_comentario');

//crear ruta para mostrar recibir el mensaje
Route::post('ajax/ver_comentarios', 'UserController@ver_comentarios');

//crear ruta para guardar los comentarios despues de leer los primeros comentarios
Route::post('ajax/publicarComentario', 'UserController@publicarComentario');



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
//Route::get('teachers/panel/{user_id?}/{course_id?}/{section?}', 'TeacherController@teachers_panel')->name('teachers_panel/{user_id?}/{course_id?}/{section?}');
Route::get('teachers/panel/{user_id}/{course_id}/{section}',['uses' => 'TeacherController@teachers_panel'])->name('teachers_panel/{user_id}/{course_id}/{section}');

//ruta para el panel inicial de la seccion academica
Route::get('teachers/academia/{user_id}','TeacherController@academia')->name('teachers/academia/{user_id}');

/*************** Rutas para los botones del panel academico del docente*/
Route::get('teachers/estudiantes/{user_id}/{course_id}/{section}/{clase}','TeacherController@estudiantes')->name('teachers/estudiantes/{user_id}/{course_id}/{section}/{clase}');
Route::get('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}','TeacherController@acumulativos')->name('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}');
Route::get('teachers/documentos/{user_id}/{course_id}/{section}/{clase}','TeacherController@documentos')->name('teachers/documentos/{user_id}/{course_id}/{section}/{clase}');
Route::get('teachers/examen/{user_id}/{course_id}/{section}/{clase}','TeacherController@examen')->name('teachers/examen/{user_id}/{course_id}/{section}/{clase}');
Route::get('teachers/descargas/{user_id}/{course_id}/{section}/{clase}','TeacherController@descargas')->name('teachers/descargas/{user_id}/{course_id}/{section}/{clase}');
/***************FIN de las Rutas para los botones del panel academico del docente*/

//crear ruta para generar las secciones asignadas a este curso de este docente
Route::post('ajax/loadsectionsfordocentes', 'TeacherController@loadsectionsfordocentes');
//crear ruta para generar las clases asignadas a este curso de este docente
Route::post('ajax/loadclassesfordocente', 'TeacherController@loadclassesfordocente');

//crear ruta para enviar una task nueva desde el formulario del docente
Route::post('ajax/send_task', 'TeacherController@send_task');



//ruta para el panel inicial de estudiante en la seccion academica
Route::get('students/academia/{user_id}','StudentController@academia')->name('students/academia/{user_id}');
//ruta para la seccion de acumulativos y documentos por parcial del student
Route::get('students/acumulativos/{user_id}/{clase}/{parcial}','StudentController@acumulativos')->name('students/acumulativos/{user_id}/{clase}/{parcial}');

//ruta para la seccion de acumulativos y documentos por parcial del student despues de filtrar una clase del panel derecho
Route::post('ajax/acumulativosbyclass', 'StudentController@acumulativosbyclass');

//crear ruta para enviar un documento nuevo desde el formulario del docente
Route::post('ajax/send_file', 'TeacherController@send_file')->name('teachers/send_file');
//crear ruta para enviar un video nuevo desde el formulario del docente
Route::post('ajax/send_video', 'TeacherController@send_video')->name('teachers/send_video');

//crear ruta para eliminar una task desde el formulario del docente
Route::post('ajax/delete_task', 'TeacherController@delete_task');

//crear ruta para eliminar un documento desde el formulario del docente
Route::post('ajax/delete_file', 'TeacherController@delete_file');

//crear ruta para eliminar un video desde el formulario del docente
Route::post('ajax/delete_video', 'TeacherController@delete_video');

//crear ruta para evaluar tareas desde el formulario del docente
Route::post('ajax/evaluar_task', 'TeacherController@evaluar_task');

//crear ruta para evaluar tareas desde el formulario del docente
Route::post('teachers/save_notas', 'TeacherController@save_notas')->name('teachers/save_notas');

//crear ruta para evaluar notas de examen y finalizar el parcial desde el formulario de examen(notas)  del docente
Route::post('teachers/save_parcial', 'TeacherController@save_parcial')->name('teachers/save_parcial');



