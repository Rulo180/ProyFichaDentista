    var lastRow=0;
    var trat0 = $("#trat0");    //Guardo una plantilla de la fila 0, en caso de que sea borrada en un futuro   
    
$(document).ready(function () {
    
    //Asocia la función delete a cada botón, 
    //cuando renderiza la tabla por primera vez
    $('.deleteButton').on('click', deleteRow);
    
    //Asocia la funcion para añadir una nueva fila al boton,
    //En este caso como es único, se asocia mediante id
    $('#addButton').on('click', addRow);
    
});

function deleteRow() {
    $(this).parents("tr").remove();
    lastRow--;
}

function addRow() {    
    
    lastRow++;      //Aumento la variable indice para las filas
    $(trat0).clone(true).attr('id', 'trat'+lastRow).insertBefore("tfoot");      //clono la plantilla y la inserto en la table
    $("#trat"+lastRow+" button").attr('class','deleteButton');
    $("#trat"+lastRow+" select:first").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat][day]').attr('id','fecha_trat_day'+lastRow);
    $("#trat"+lastRow+" select:eq(1)").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat][month]').attr('id','fecha_trat_month'+lastRow);
    $("#trat"+lastRow+" select:eq(2)").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat][year]').attr('id','fecha_trat_year'+lastRow);
    $("#trat"+lastRow+" select:eq(3)").attr('name','data[Tratamiento]['+lastRow+'][prestacion_id]').attr('id','prestacion_id'+lastRow);
    $("#trat"+lastRow+" select:eq(4)").attr('name','data[Tratamiento]['+lastRow+'][diente_id]').attr('id','diente_id'+lastRow);
    $("#trat"+lastRow+" select:eq(5)").attr('name','data[Tratamiento]['+lastRow+'][cara_id]').attr('id','cara_id'+lastRow);
    $("#trat"+lastRow+" select:eq(6)").attr('name','data[Tratamiento]['+lastRow+'][obra_id]').attr('id','obra_id'+lastRow);
    
    $('.deleteButton').on('click', deleteRow);      //Vuelvo a asignar el evento de eliminar a los nuevos botones

//Solucion Diego

//    //Obtiene el cuerpo de la tabla
//    var $tbody = $('#tablaTrats').find('tbody');
//
//    //Crea la nueva fila
//    var newRow = '<tr><td>Soy una nueva Fila!!!</td><td><button id="myButton" class=".deleteButton" type="button">Quitar</button></td></tr>';
//
//    //Agrega la nueva fila al cuerpo de la tabla
//    $tbody.append(newRow);
//
//    //Quita los eventos de los botones eliminar, ya que los nuevos botones que se agreguen no estarán asociados
//    $('.deleteButton').off();
//
//    //Vuelve a asignar el evento de eliminar, así lo agrega a los 
//    //nuevos botones
//    $('.deleteButton').on('click', deleteRow);


}


