  
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

        //Metodo crear para areas de trabajo
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
                            alert("El area de trabajo: "+nombre+", se ha agregado correctamente.");
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
            //Metodo actualizar para areas de trabajo
            $("#editarAT").on("click", function(e){
                e.preventDefault(); 
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
                        success: function(data){
                        console.log(data);
                        if((data.errors)){
                            alert("No se pudo actualizar correctamente.");
                        }
                        else{
                            var data = $('#tbodywa').find('tbody').find("tr[data-item='" + id + "']");
                            console.log(data);
                            alert("actualizado correctamente");
                            $(data.find(".waname")).html(name);
                            $(data.find(".wadescription")).html(description);
                            $("#guardarAT").removeClass("hide");
                            $("#editarAT").addClass("hide");
                            $("#cancelarAT").addClass("hide");
                            $("#formularioAT")[0].reset();                            
                        }
                    }
                }); 
             });

            //Metodo eliminar para areas de trabajo
            $(".eliminar_at").on("click", function(e){  
                    e.preventDefault();
                    var id = $(this).attr('data-id');
                    var name = $(this).attr('data-name');
                    $.ajax({
                        type:'DELETE',
                        url:'/work_area/'+id,
                        data: {
                            "_token": $('#token').val(),
                        },
                        success: function(data){
                        console.log(data);
                        if((data.errors)){
                            alert("No se pudo eliminar correctamente.");
                        }
                        else{
                        alert("El area de trabajo: "+name+", se ha eliminado correctamente.");
                        var data = $('#tbodywa').find('tbody').find("tr[data-item='" + id + "']");
                        data.remove();
                    }

                }
            });           
        });
       
       

        
        