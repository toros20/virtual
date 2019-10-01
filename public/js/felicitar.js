//funcion para felicitar a los estudiantes de excelencia academica
function felicitar(id) {

    var token = $("#token").val();
    
    $.ajax({

        url: 'ajax/felicitaciones',
        headers: token,
        data: { _id: id, _token: token },
        type: 'POST',
        datatype: 'json',
        success: function (data) {   
            //console.log(response);
            $('#button_'+id).html(data);
            $('#button_a_'+id).attr("disabled", "disabled");
        },
        error: function (response) {
            console.log(response);
        }
    });

}

//funcion para felicitar a los estudiantes de excelencia academica
function felicitar_by_id(id) {

    var token = $("#token").val();
    
    $.ajax({

        url: '../../ajax/felicitaciones',
        headers: token,
        data: { _id: id, _token: token },
        type: 'POST',
        datatype: 'json',
        success: function (data) {   
            //console.log(response);
            $('#button_'+id).html(data);
            $('#button_a_'+id).attr("disabled", "disabled");
        },
        error: function (response) {
            console.log(response);
        }
    });

}

/*function ver_mas(num){

    var token = $("#token").val();
    
    $.ajax({

        url: 'ajax/ver_mas_excelencia',
        headers: token,
        data: { _num: num, _token: token },
        type: 'POST',
        datatype: 'json',
        success: function (data) {   
            //console.log(response);
            $('#estudiantes').html(data);
            //$('#button_a_'+id).attr("disabled", "disabled");
        },
        error: function (response) {
            console.log(response);
        }
    });


}*/