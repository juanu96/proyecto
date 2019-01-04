
/* error_opt me imprime la notificacion de error   */
       var error_opt = {
            className: 'error',
            position: "top-center",
            autoHide: false
        }; 
/* succes_opt me imprime la notificacion de success   */
        var success_opt = {
            className: 'success',
            position: "top-center",
            autoHide: true
        };
/* variable global token para el envio de informacion al controlador */
        var token = $('meta[name="csrf-token"]').attr('content');

        var workareaform = $('#workareaform');
        var nombrewaf = $(workareaform.find('#nameAT'));
        var descriptionwaf = $(workareaform.find('#descriptionAT'));

/* --------------------funciones para bind-------------------------------- */

        /* elimnar info work area */
    function deletewa() {
        /* $(this).attr('data-id') obtenemos el id de el elemento que
        queremeos eliminar a traves de la funcion bind */
        var id = $(this).attr('data-id');
        var url = '/work_area/' + id;
        var res = delete_data(url);
        if (res !== null) {
            var data = $('#tbodywa').find('tbody').find("tr[data-item='" + id + "']");
            console.log(id);
            data.remove()
            console.log(data);            
        }
    }
    /* editar info work area */
    function editwa() {
        $("#editarAT").removeClass("hide");
        $(".cancelar").removeClass("hide");
        $("#guardarAT").addClass("hide"); 
        $(this).parents("tr").find("td:eq(0)").each(function(){//obtenemos el id de la tabla work area
            id=$(this).html();                
        });
        $(this).parents("tr").find("td:eq(1)").each(function(){//obtenemos el name de la tabla work area
            name=$(this).html();                
        });
        $(this).parents("tr").find("td:eq(2)").each(function(){//obtenemos la description de la tabla work area
            description=$(this).html();                
        });
        $("#idAT").val(id);//asignamos el id obtenido anteriormente y se lo agregamos al input con id="adAT"
        $("#nameAT").val(name);//asignamos el name obtenido anteriormente y se lo agregamos al input con id="nameAT"
        $("#descriptionAT").val(description);//asignamos la description obtenido anteriormente y se lo agregamos al input con id="descriptionAT"
    }

         /* elimnar info job title */
         function deletejt() {
             /* $(this).attr('data-id') obtenemos el id de el elemento que
        queremeos eliminar a traves de la funcion bind */
            var id = $(this).attr('data-id');
            var url = '/job_title/' + id;//asignamos la url mas id que tiene que buscar para eliminar
            var res = delete_data(url);//a la funcion delete_data le mandamos la url para que ejecute el ajax y elimine
            if (res !== null) {//verificamos que la respuesta no sea nula
                var data = $('#tabla_jobtitle').find('tbody').find("tr[data-item='" + id + "']");//buscamos el elemento que queremos eliminar en nuestra tabla usando el id
                console.log(id);
                data.remove()// usamos la funcion remove() para quitar el elemento buscado de nuestra tabla
                console.log(data);            
            }
        }

         /* editar info job title */
    function editjt() {
        $(".editarjt").removeClass("hide");
    $(".cancelar").removeClass("hide");
    $(".guardarjt").addClass("hide"); 
    $(this).parents("tr").find("td:eq(0)").each(function(){
        id=$(this).html();                
    });
    $(this).parents("tr").find("td:eq(1)").each(function(){
        name=$(this).html();                
    });
    $(this).parents("tr").find("td:eq(2)").each(function(){
        description=$(this).html();                
    });
    $(this).parents("tr").find("td:eq(3)").each(function(){
        salary=$(this).html();                
    });
    work_area_id=($(this).attr("data-name"));
    console.log(work_area_id);
    
    $("#idjt").val(id);
    $("#namejt").val(name);
    $("#descriptionjt").val(description);   
    $("#salaryjt").val(salary); 
    $("#work_area_idjt").val(work_area_id);
    }

 /*  //---------------------------------------------------------------------------------------------------------------   */
        /* //Metodo crear para areas de trabajo */
        $("#formularioAT").on("submit", function(e){            
                e.preventDefault(); 
                var form = $(this);
                var formData = new FormData(form[0]);
                var url = '/work_area';
                var type = 'POST';

                var res = postData(formData, url, type);
                if (res !== null) {
                    var	row ='<tr data-item="'+res.id+'">'+
                    '<td>'+res.id+'</td>'+
                    '<td class="waname">'+res.name+'</td>' +
                    '<td class="wadescription">'+res.description+'</td>' +
                    '<td>'+
                    '<a href="#" class="glyphicon glyphicon-pencil editarat_1" aria-hidden="true" name="editar" data-id="'+res.id+'" data-name="'+res.name+'"></a>'+
                    '<a href="" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_at" aria-hidden="true" style="margin-left: 20px" data-id="'+res.id+'"></a>'+
                    '</td>'+
                    '</tr>';
                    $("#tbodywa tr:last").after(row);   
                    $("#formularioAT")[0].reset();                            
                    $(".eliminar_at").bind("click", deletewa);
                    $(".editarat_1").bind("click", editwa);
                }
            });
      
           /*  //Metodo actualizar para areas de trabajo */
           $("#editarAT").on("click", function(e){
            e.preventDefault(); 
            
            var form = $('#formularioAT');
            var id = form.find($('#idAT')).val();
            var name = form.find($('#nameAT'));
            var description = form.find($('#descriptionAT'));
            var formData = {
                _token: token,
                name: name.val(),
                description: description.val()
            };

            var url = '/work_area/' + id;
            var type = "PUT";
            var res = post_form(formData, url, type);
            if (res !== null) {
                var data = $('#tbodywa').find('tbody').find("tr[data-item='" + id + "']");
                console.log(data);
                $(data.find(".waname")).html(res.name);
                $(data.find(".wadescription")).html(res.description);
                $("#guardarAT").removeClass("hide");
                $("#editarAT").addClass("hide");
                $(".cancelar").addClass("hide");
                $("#formularioAT")[0].reset();      
            }
                    
            }); 

           /*  //Metodo eliminar para areas de trabajo */
           $(".eliminar_at").on("click", function(e){  
            var id = $(this).attr('data-id');
            var url = '/work_area/' + id;
            var res = delete_data(url);
            if (res !== null) {
                var data = $('#tbodywa').find('tbody').find("tr[data-item='" + id + "']");
                data.remove();
            }   
        
        });
/*-------------------------------------------JOBS--TITLE--------------------------------------------------------------*/

$(".editarjt_1").click(function(){
    $(".editarjt").removeClass("hide");
    $(".cancelar").removeClass("hide");
    $(".guardarjt").addClass("hide"); 
    $(this).parents("tr").find("td:eq(0)").each(function(){
        id=$(this).html();                
    });
    $(this).parents("tr").find("td:eq(1)").each(function(){
        name=$(this).html();                
    });
    $(this).parents("tr").find("td:eq(2)").each(function(){
        description=$(this).html();                
    });
    $(this).parents("tr").find("td:eq(3)").each(function(){
        salary=$(this).html();                
    });
    /* $(this).parents("tr").find("td:eq(4)").each(function(){
        work_area_id=$(this).html();                
    }); */
    work_area_id=($(this).attr("data-name"));
    
    $("#idjt").val(id);
    $("#namejt").val(name);
    $("#descriptionjt").val(description);   
    $("#salaryjt").val(salary); 
    $("#work_area_idjt").val(work_area_id);
    
   /*  $("#area_trabajoat option").each(function(){
     var a = $(this).attr('id');
     if(work_area_id == a){
       alert('a');
    }
    }); */ 
    
});


  /* //Metodo crear para puestos de trabajo */
  $("#formulariojt").on("submit", function(e){            
    e.preventDefault(); 
    var form = $(this);
    var formData = new FormData(form[0]);
    var url = '/job_title';
    var type = 'POST';

    var res = postData(formData, url, type);
    console.log(res);
    if (res !== null) {
        var row ='<tr data-item="'+res.id+'">'+
        '<td>'+res.id+'</td>'+
        '<td class="jtname">'+res.name+'</td>' +
        '<td class="jtdescription">'+res.description+'</td>' +
        '<td class="jtsalary">'+res.salary+'</td>' +
        '<td class="jtwork_area_id">'+res.WorkAreaName+'</td>' +
        '<td>'+
        '<a href="#" class="glyphicon glyphicon-pencil editarjt_1" aria-hidden="true" name="editar" data-id="'+res.id+'" data-name="'+res.work_area_id+'"></a>'+
        '<a href="" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_jt" aria-hidden="true" style="margin-left: 20px" data-id="'+res.id+'"></a>'+
        '</td>'+
        '</tr>';
        $("#tabla_jobtitle tr:last").after(row); 
        $("#formulariojt")[0].reset(); 
        $(".eliminar_jt").bind("click", deletejt);
        $(".editarjt_1").bind("click", editjt);
    }
});

/*  //Metodo actualizar para puestos de trabajo */
$("#editarjt").on("click", function(e){
    e.preventDefault(); 

    var form = $('#formulariojt');
    var id = form.find($('#idjt')).val();    
    var name = form.find($('#namejt')).val();
    var description = form.find($('#descriptionjt')).val();
    var salary = form.find($('#salaryjt')).val();
    var areatrabajo = form.find($('#work_area_idjt')).val();    
    var formData = {
        _token: token,
        name: name,
        description: description,
        salary: salary,
        work_area_id: areatrabajo
    };

    var url = '/job_title/' + id;
    var type = "PUT";
    var res = post_form(formData, url, type);
    console.log(res);
    if (res !== null) {
        var data = $('#tabla_jobtitle').find('tbody').find("tr[data-item='" + id + "']");
        console.log(data);
        $(data.find(".jtname")).html(res.name);
        $(data.find(".jtdescription")).html(res.description);
        $(data.find(".jtsalary")).html(res.salary);
        $(data.find(".jtwork_area_id")).html(res.WorkAreaName);
        $("#guardarjt").removeClass("hide");
        $("#editarjt").addClass("hide");
        $(".cancelar").addClass("hide");
        $("#formulariojt")[0].reset();
    }   
            
    }); 

    /*  //Metodo eliminar para puestos de trabajo */
    $(".eliminar_jt").on("click", function(e){  
        var id = $(this).attr('data-id');
        var url = '/job_title/' + id;
        var res = delete_data(url);
        if (res !== null) {
            var data = $('#tabla_jobtitle').find('tbody').find("tr[data-item='" + id + "']");
            data.remove();
        }   
    
    });

  
  /* //----------------------------------------------------------------------------------------------------------- */
  
  /*Enviar sin submit*/
  function post_form(formData, url, type) {
    var response = null;
    $.ajax({
        headers: {'X-CSRF-TOKEN': token},
        url: url,
        method: type,
        data: formData,
        dataType: 'json',
        success: function (res) {
            $.notify(res.message, success_opt);
            response = res.data;
        },
        error: function (res) {
            if (res) {
                $.notify(res.responseJSON.message, error_opt);
            } else {
                $.notify('Error desconocido', error_opt);
            }
        },
        async: false
    });
    return response;
}
/*  enviar con submit */
function postData(formData, url, type) {
    var response = null;
    $.ajax({
        headers: {'X-CSRF-TOKEN': token},
        url: url,
        type: type,
        data: formData,
        dataType: 'json',
        success: function (res) {
            $.notify(res.message, success_opt);
            response = res.data;
        },
        error: function (res) {
            console.log(res.responseJSON);
            if (res) {
                $.each(res.responseJSON.errors, function(i, item) {
                    console.log(item);
                    $.notify(item, error_opt);
                });                
            } else {
                $.notify('Error desconocido', error_opt);
            }
        },
        cache: false,
        contentType: false,
        processData: false,
        async: false
    });
    return response;
}
    /*Eliminar info*/
    function delete_data(url) {
        var response = null;
        $.ajax({
            headers: {'X-CSRF-TOKEN': token},
            url: url,
            method: 'delete',
            dataType: 'json',
            success: function (res) {
                $.notify(res.message, success_opt);
                response = res.data;
            },
            error: function (res) {
                if (res) {
                    $.notify(res.responseJSON.message, error_opt);
                    response = res.data;
                } else {
                    $.notify('Error desconocido', error_opt);
                }
            },
            async: false
        });
        return response;
    }

  
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
    $(".cerrar").click(function(){
        $("#guardarAT").removeClass("hide");
        $("#editarAT").addClass("hide");
        $(".cancelar").addClass("hide");
        $("#formularioAT")[0].reset(); 
        $("#formulariojt")[0].reset();           
    }); 

    $(".cancelar").click(function(){
        $("#guardarAT").removeClass("hide");
        $(".guardarjt").removeClass("hide");
        $("#editarAT").addClass("hide");
        $(".editarjt").addClass("hide");
        $(".cancelar").addClass("hide");
        $("#formularioAT")[0].reset();     
        $("#formulariojt")[0].reset();       
    });        
    
    $(".editarat_1").click(function(){
        $("#editarAT").removeClass("hide");
        $(".cancelar").removeClass("hide");
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
