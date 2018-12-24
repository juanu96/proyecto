$( document ).ready(function() {
    listarworkarea();
});  
  
  
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
        $("#guardarAT").click(function(e){            
                e.preventDefault(); 

                var nombre = $('#nameAT').val();
                var descripción = $('#descriptionAT').val();
                $.ajax({
                    type: "POST",
                    url:'/worker/savewa',
                    data: {
                        "_token": $('#token').val(),   
                        'name': nombre,
                        'description': descripción,
                    },
                    success: function(data){
                        if((data.errors)){
                            alert("hubo un error");
                        }
                        else{
                            alert(data.success);
                        }
                    }              
                });
            });

       

        
        