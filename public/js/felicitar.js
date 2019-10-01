//funcion para felicitar a los estudiantes de excelencia academica
function felicitar(id) {

    //obtenemos el valor actual de felicitaciones
    /*var valor_actual = document.getElementById('felicitaciones_'+id).value
    var nuevo_valor = eval(valor_actual) + 1;
    document.getElementById("#felicitaciones_".id).value =  valor_actual +1;

    alert("valor inicial="+valor_actual);
    alert("nuevo valor="+nuevo_valor);*/

    //var token = $("#token").val();
    var token = document.getElementById('token').value
    alert(token);
    $.ajax({

        url: '../../ajax/felicitaciones',
        //url:'../ajax/coursesbymodalityid',
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