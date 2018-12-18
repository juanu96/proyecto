  $(function() {
        $('#Worker-table').DataTable({
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }},
        
        });


        $('#users-table').DataTable({
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }},
        
        
        });

       /*  $('#datepicker').datepicker({
            format: 'mm/dd/yyyy'
        });
 */
       
         
       
        
    });  
    
        /* $(".editarat_1").on("click",function(){
            $("#editarAT").removeClass("hide");
            $("#cancelarAT").removeClass("hide");
            $("#guardarAT").addClass("hide");          

        }); */

        $("#cerrar").click(function(){
            $("#guardarAT").removeClass("hide");
            $("#editarAT").addClass("hide");
            $("#cancelarAT").addClass("hide");
            $("#formularioAT")[0].reset();            
        });

        $("#btn-closeAT").click(function(){
            $("#guardarAT").removeClass("hide");
            $("#editarAT").addClass("hide");
            $("#cancelarAT").addClass("hide");
            $("#formularioAT")[0].reset();            
        });
        
        $(".editarat_1").click(function(){
            /* alert($(this).data("id"));
            alert($(this).data("name"));
            alert($(this).data("description"));
 */
           // $("#nameAT").val("id");
           var id = $(this).attr("data-target");

            alert("el id es: "+id);
            
            $("#idAT").val(id);

             var valores="";
 
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
                valores+=$(this).html()+"\n";
            });
 
            alert(valores);
                    
            });











































        
   
   /* buscar tabla areas laborales dentro de ella buscar las fila que tenga el data item con el id obtenido anterior

   find de javascript/jquery */
   
        
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    // {{URL::action('work_areaController@edit',$itemwa->id)}}