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
    });onchange="loadcourses()"
   

}

