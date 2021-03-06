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


//ruta para mostrar la pagina inicial de excelencia academica
Route::get('/excelencia', 'StudentController@excelencia')->name('excelencia');

//ruta para mostrar la excelencia academica por curso y seccion
Route::get('/excelencias_by_id/{course_id}/{section}', 'StudentController@excelencias_by_id')->name('excelencias_by_id/{course_id}/{section}');

//Modulo para agregar un nuevo alumnos de excelencia Academica
Route::get('/excelencia/add','UserController@addExcelencia')->name('addExcelencia');

//ruta para almacenar un nuevo estudiante de excelencia academica
Route::POST('/excelencia/store','UserController@storeExcelencia')->name('excelencia.store');

//Modulo para mostar la administracion de la excelencia academica
Route::get('/indexExcelencia','UserController@indexExcelencia')->name('indexExcelencia');

//Modulo para agregar un nuevo alumnos de excelencia Academica
Route::get('/excelencia/edit/{id}','UserController@editExcelencia')->name('editExcelencia/edit/{id}');

//ruta para actualizar el estudiante de excelencia
Route::POST('updateExcelencia','UserController@updateExcelencia')->name('updateExcelencia');



//ruta para mostrar la encuesta del personal docente
Route::get('/users/encuesta', 'UserController@encuesta')->name('encuesta');

//ruta para mostrar la encuesta del personal docente
Route::post('/users/verificar_cuenta', 'UserController@verificar_cuenta')->name('verificar_cuenta');

//crear ruta para guardar los comentarios despues de leer los primeros comentarios
Route::post('/users/votar_encuesta', 'UserController@votar_encuesta');

//crear ruta para ya ha terminado la encuesta
Route::get('/users/final_encuesta', 'UserController@final_encuesta');



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


//PARA ACTIVAR EL METODO LLAMADO TABLAS, EL CUAL SUMA LOS ACUMULATIVOS DE CADA PARCIAL
Route::get('/users/tablas/{course_id}/{section}', 'UserController@tablas')->name('users.tablas');


//ruta para mostrar la seccion de boletas de calificaciones
Route::get('/users/boletas/{course_id}/{section}', 'UserController@boletas')->name('users_boletas/{course_id}/{section}');
//ruta para mostrar la lista de los alumnos por curs y seccion
Route::get('/users/list_students/{user_id}/{course_id}/{section}', 'UserController@list_students')->name('list_students/{user_id}/{course_id}/{section}');


//ruta para mostrar la seccion del panel del administrador
Route::get('/users/panel/{user_id}', 'UserController@panel')->name('users_panel/{user_id}');

//ruta para mostrar la seccion del panel  coordinacion Academica
Route::get('/users/panel_coordinacion/{user_id}', 'UserController@panel_coordinacion')->name('users_panel_coordinacion/{user_id}');


//ruta para mostrar la seccion del panel de administracion, seretaria, coordinacion , sistemas
Route::get('/users/panel_admin/{user_id}', 'UserController@panel_admin')->name('users_panel_admin/{user_id}');





//crear ruta para el panel de consejeria
Route::get('/users/panel_consejeria/{user_id}', 'UserController@panel_consejeria')->name('panel_consejeria/{user_id}');

//ruta para mostrar la seccion de personalidad de los consejeros
Route::get('/users/personalidad/{user_id}/{course_id}/{section}/{parcial}', 'UserController@personalidad')->name('users/personalidad/{user_id}/{course_id}/{section}/{parcial}');

//crear ruta para evaluar notas de examen y finalizar el parcial desde el formulario de examen(notas)  del docente
Route::post('users/save_personalidad', 'UserController@save_personalidad')->name('users/save_personalidad');

//ruta para mostrar la seccion de personalidad de los consejeros
Route::get('/users/actas/{course_id}/{section}/{parcial}', 'UserController@actas')->name('actas/{course_id}/{section}/{parcial}');



Route::get('/users/boletas_docentes', 'UserController@boletas_docentes')->name('boletas_docentes');


Route::get('/users/boleta_acumulativos/{course_id}/{section}/{user_id}', 'UserController@boleta_acumulativos')->name('users/boleta_acumulativos/{course_id}/{section}/{user_id}');


//ruta para mostrar la seccion de personalidad de los consejeros
Route::get('/users/reporte_docentes/{parcial}', 'UserController@reporte_docentes')->name('reporte_docentes/{parcial}');

//ruta para mostrar la seccion de acumulativos de las coordinaciones
Route::get('/users/acumulativos/{user_id}/{course}/{section}/{clase}/{parcial}', 'UserController@acumulativos')->name('users/acumulativos/{user_id}/{course}/{section}/{clase}/{parcial}');

//ruta para mostrar la seccion de personalidad de los consejeros
Route::get('/users/inasistencias_docentes', 'UserController@inasistencias_docentes')->name('inasistencias_docentes');

//ruta para mostrar la seccion de personalidad de los consejeros
Route::get('/users/inasistencias_estudiantes', 'UserController@inasistencias_estudiantes')->name('inasistencias_estudiantes');


//ruta para mostrar la seccion de supervicion de docentes a los coordinadores
Route::get('/users/coordinacion/{user_id}/{teacher_id}/{parcial}', 'UserController@coordinacion')->name('users/coordinacion/{user_id}/{teacher_id}/{parcial}');

//ruta para generar los acceso de Gsuit2020
Route::get('/users/gsuit/', 'UserController@gsuit')->name('users/gsuit');
Route::post('/users/gsuitpdf', 'UserController@gsuitpdf')->name('users/gsuitpdf');
Route::get('/users/pdfGsuit/{email}', 'UserController@pdfGsuit')->name('users/pdfGsuit/{email}');




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

//crear ruta para registrar una feliictacion en el area de excelencia academica
Route::post('ajax/felicitaciones', 'UserController@felicitaciones');

//crear ruta para ver (12)mas estudiantes de excelencia academica
Route::post('ajax/ver_mas_excelencia', 'UserController@ver_mas_excelencia');

//crear ruta para ver secciones segun curso Gsuit
Route::post('ajax/sectionsbycoursesGsuit', 'UserController@sectionsbycoursesGsuit');



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
//Route::get('teachers/descargas/{user_id}/{course_id}/{section}/{clase}','TeacherController@descargas')->name('teachers/descargas/{user_id}/{course_id}/{section}/{clase}');
Route::get('teachers/cuadrouno/{user_id}/{course_id}/{section}/{clase}','TeacherController@cuadrouno')->name('teachers/cuadrouno/{user_id}/{course_id}/{section}/{clase}');
//ruta para mostrar el listado de alumnos a los docentes
Route::get('teachers/students/{user_id}/{course_id}/{section}','TeacherController@students')->name('teachers/students/{user_id}/{course_id}/{section}');

/***************FIN de las Rutas para los botones del panel academico del docente*/

//crear ruta para generar las secciones asignadas a este curso de este docente
Route::post('ajax/loadsectionsfordocentes', 'TeacherController@loadsectionsfordocentes');
//crear ruta para generar las clases asignadas a este curso de este docente
Route::post('ajax/loadclassesfordocente', 'TeacherController@loadclassesfordocente');

//crear ruta para enviar una task nueva desde el formulario del docente
//Route::post('ajax/send_task', 'TeacherController@send_task');
//crear ruta para enviar una task nueva desde el formulario del docente
Route::post('teachers/send_task', 'TeacherController@send_task')->name('teachers.send_task');



//ruta para el panel inicial de estudiante en la seccion academica
Route::get('students/academia/{user_id}','StudentController@academia')->name('students/academia/{user_id}');
//ruta para la seccion de acumulativos y documentos por parcial del student
Route::get('students/acumulativos/{user_id}/{clase}/{parcial}','StudentController@acumulativos')->name('students/acumulativos/{user_id}/{clase}/{parcial}');
//crear ruta para enviar un documento nuevo desde el formulario del Estudiante
Route::post('students/send_file', 'StudentController@send_file')->name('students/send_file');
//ruta para la seccion de acumulativos y documentos por parcial del student despues de filtrar una clase del panel derecho
Route::post('ajax/acumulativosbyclass', 'StudentController@acumulativosbyclass');

//crear ruta para enviar un documento nuevo desde el formulario del docente
Route::post('ajax/send_file', 'TeacherController@send_file')->name('teachers/send_file');
//crear ruta para enviar un video nuevo desde el formulario del docente
Route::post('ajax/send_video', 'TeacherController@send_video')->name('teachers/send_video');

//crear ruta para enviar un enlace web nuevo desde el formulario del docente
Route::post('ajax/send_link', 'TeacherController@send_link')->name('teachers/send_link');

//crear ruta para eliminar una task desde el formulario del docente
Route::post('ajax/delete_task', 'TeacherController@delete_task');

//crear ruta para eliminar un documento desde el formulario del docente
Route::post('ajax/delete_file', 'TeacherController@delete_file');

//crear ruta para eliminar un video desde el formulario del docente
Route::post('ajax/delete_video', 'TeacherController@delete_video');

//crear ruta para eliminar un enlace desde el formulario del docente
Route::post('ajax/delete_enlace', 'TeacherController@delete_enlace');

//crear ruta para evaluar tareas desde el formulario del docente
Route::post('ajax/evaluar_task', 'TeacherController@evaluar_task');

//crear ruta para salvar tareas desde el formulario del docente
Route::post('teachers/save_notas', 'TeacherController@save_notas')->name('teachers/save_notas');

//crear ruta para editar tareas desde el formulario del docente
Route::post('ajax/editar_task', 'TeacherController@editar_task');

//crear ruta para salvar la edicion de la tarea desde el formulario modal del docente
Route::post('teachers/save_editar_tarea', 'TeacherController@save_editar_tarea')->name('teachers/save_editar_tarea');

//crear ruta para ver las tareas enviadas por el estudiante
Route::post('ajax/ver_filetasks', 'TeacherController@ver_filetasks');




//crear ruta para evaluar notas de examen y finalizar el parcial desde el formulario de examen(notas)  del docente
Route::post('teachers/save_parcial', 'TeacherController@save_parcial')->name('teachers/save_parcial');

//crear ruta para enviar una imagen nuevo desde el panel de mensajes del docente
Route::post('teachers/send_image', 'TeacherController@post_image_teacher')->name('teachers/send_image');

//crear ruta para enviar un video de youtube nuevo desde el panel de mensajes del docente
Route::post('teachers/send_videoyoutube', 'TeacherController@send_videoyoutube')->name('teachers/send_videoyoutube');

//crear ruta para eliminar todo un post nuevo desde el panel de mensajes del docente
Route::post('teachers/delete_post', 'TeacherController@delete_post')->name('teachers/delete_post');


