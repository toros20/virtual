function loadcourses(){

    //obtenemos  el id de la modalidad seleccionada
     var modality = $("#modalities").val();
     var token = $("#token").val();

    $.ajax({

        url:'../../ajax/coursesbymodalityid',
        headers: token ,
        data: {modality_id:modality,_token:token},
        type:'POST',
        datatype:'json',
        success:function(data)
        {
            //console.log(response);
            $('#courses').html(data);
        },
        error: function (response) {
            console.log(response);
          }
    });
   

}

//codigo para cargar solo las secciones asignadas al curso seleccionado
function loadsections(){

    //obtenemos  el id de la modalidad seleccionada
     var course = $("#courses").val();
     var token = $("#token").val();
    
    $.ajax({

        url:'../../ajax/sectionsbycoursesid',
        headers: token ,
        data: {course_id:course,_token:token},
        type:'POST',
        datatype:'json',
        success:function(data)
        {
            //console.log(response);
            $('#sections').html(data);
        },
        error: function (response) {
            console.log(response);
          }
    });
   

}

//codigo para cargar solo las clases asignadas al curso seleccionado
function loadclases(){

    //obtenemos  el id de la modalidad seleccionada
     var course = $("#courses").val();
     var token = $("#token").val();
    
    $.ajax({

        url:'../../ajax/clasesbycoursesid',
        headers: token ,
        data: {course_id:course,_token:token},
        type:'POST',
        datatype:'json',
        success:function(data)
        {
            //console.log(response);
            $('#clases').html(data);
        },
        error: function (response) {
            console.log(response);
          }
    });
   

}

//codigo para cargar solo las clases asignadas a una modalidad seleccionado
function loadclasesbymodality(){

    //obtenemos  el id de la modalidad seleccionada
     var modalidad = $("#modalities").val();
     var token = $("#token").val();
    
    $.ajax({

        url:'../../ajax/clasesbymodalityid',
        headers: token ,
        data: {modality_id:modalidad,_token:token},
        type:'POST',
        datatype:'json',
        success:function(data)
        {
            //console.log(response);
            $('#clases').html(data);
        },
        error: function (response) {
            console.log(response);
          }
    });
   

}


