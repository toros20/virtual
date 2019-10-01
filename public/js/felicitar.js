//funcion para felicitar a los estudiantes de excelencia academica
function felicitar(id) {

    var token = $("#token").val();
    
    $.ajax({

        url: '../../ajax/felicitaciones',
        headers: token,
        data: { _id: id, _token: token },
        type: 'POST',
        datatype: 'json',
        success: function (data) {   
            //console.log(response);
            $('#felicitaciones_'.id).html(data);
        },
        error: function (response) {
            console.log(response);
        }
    });

}