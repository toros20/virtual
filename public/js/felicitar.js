//funcion para felicitar a los estudiantes de excelencia academica
function felicitar(id){
    
    //obtenemos el valor actual de felicitaciones
    var valor_actual = $("felicitaciones_".id).val(); 
    //var nuevo_valor = valor_actual +1;
    //document.getElementById("#felicitaciones_".id).value =  valor_actual +1;

    alert("valor inicial="+valor_actual);
    //alert("nuevo valor=".nuevo_valor);

   /* $.ajax({

        url:'../../ajax/felicitaciones', 
        //url:'../ajax/coursesbymodalityid',
        headers: token ,
        data: {_nuevo_valor:nuevo_valor,_token:token,_id:id},
        type:'POST',
        datatype:'json',
        success:function(data)
        {
            //console.log(response);
            $('#felicitaciones_'.id).html(data);
        },
        error: function (response) {
            console.log(response);
          }
    });*/

}