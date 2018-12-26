  
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
         
       
        
    });  
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

        $("#cancelarAT").click(function(){
            $("#guardarAT").removeClass("hide");
            $("#editarAT").addClass("hide");
            $("#cancelarAT").addClass("hide");
            $("#formularioAT")[0].reset();            
        });        
        
        $(".editarat_1").click(function(){
            $("#editarAT").removeClass("hide");
            $("#cancelarAT").removeClass("hide");
            $("#guardarAT").addClass("hide"); 
            $(this).parents("tr").find("td:eq(0)").each(function(){
                id=$(this).html();                
            });
            $(this).parents("tr").find("td:eq(1)").each(function(){
                name=$(this).html();                
            });
            $(this).parents("tr").find("td:eq(2)").each(function(){
                description=$(this).html();                
            });
            $("#idAT").val(id);
            $("#nameAT").val(name);
            $("#descriptionAT").val(description);          
        });

        //funcion guardar work_area
        $("#guardarAT").on("click", function(e){            
                e.preventDefault(); 

                var nombre = $('#nameAT').val();
                var descripción = $('#descriptionAT').val();
                $.ajax({
                    type: "POST",
                    url:'/work_area',
                    dataType: "json",
                    data: {
                        "_token": $('#token').val(),   
                        'name': nombre,
                        'description': descripción,
                    },
                    success: function(data){
                        console.log(data);
                        if((data.errors)){
                            alert("No se pudo agregar correctamente.");
                        }
                        else{
                            alert("Area de trabajo: "+nombre+", agregada correctamente.");
                            $("#formularioAT")[0].reset();
                            var	row = '';                            
                                      console.log(data.data);     
                                    var value = data.data;   
                                  row ='<tr>'+
                                  '<td>'+value.id+'</td>'+
                                  '<td>'+value.name+'</td>' +
                                  '<td>'+value.description+'</td>' +
                                  '<td>'+
                                  '<a href="#" class="glyphicon glyphicon-pencil editarat_1" aria-hidden="true" name="editar" data-id="'+value.id+'" data-name="'+value.name+'"></a>'+
                                  '<a href="" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_at" aria-hidden="true" style="margin-left: 20px" data-id="'+value.id+'"></a>'+
                                  '</td>'+
                                  '</tr>';
                                  $("#tbodywa tr:last").after(row);                                                          
                                                 
                        }
                    }              
                });                  
            });

            $("#editarAT").on("click", function(){  
                var id = $('#idAT').val();
                var name = $('#nameAT').val();
                var description = $('#descriptionAT').val();
                $.ajax({
                    type:"PUT",
                    url:'/work_area/'+id,
                    dataType: "json",
                    data: {
                        "_token": $('#token').val(),   
                        'name': name,
                        'description': description,
                    },
                         //recorda que tienes que agregar de nuevo el editado a la tabla         
                });                 
                
                
            });
       

        
        