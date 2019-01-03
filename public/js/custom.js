

       var error_opt = {
            className: 'error',
            position: "top-center",
            autoHide: false
        }; 

        var success_opt = {
            className: 'success',
            position: "top-center",
            autoHide: true
        };

        var token = $('meta[name="csrf-token"]').attr('content');

        var workareaform = $('#workareaform');
        var nombrewaf = $(workareaform.find('#nameAT'));
        var descriptionwaf = $(workareaform.find('#descriptionAT'));


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
        /* Editar info */
    function deletewa() {
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

    function editwa() {
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
    $(this).parents("tr").find("td:eq(4)").each(function(){
        work_area_id=$(this).html();                
    });
    $("#idjt").val(id);
    $("#namejt").val(name);
    $("#descriptionjt").val(description);   
    $("#salaryjt").val(salary); 
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
        '<a href="#" class="glyphicon glyphicon-pencil editarjt_1" aria-hidden="true" name="editar" data-id="'+res.id+'" data-name="'+res.name+'"></a>'+
        '<a href="" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_jt" aria-hidden="true" style="margin-left: 20px" data-id="'+res.id+'"></a>'+
        '</td>'+
        '</tr>';
        $("#tabla_jobtitle tr:last").after(row); 
        $("#formulariojt")[0].reset(); 
    }
});

/*  //Metodo actualizar para puestos de trabajo */
$("#editarjt").on("click", function(e){
    e.preventDefault(); 
    
    var form = $('#formulariojt');
    var id = form.find($('#idjt')).val();
    var name = form.find($('#namejt'));
    var description = form.find($('#descriptionjt'));
    var salary = form.find($('#namejt'));
    var areatrabajo = form.find($('#work_area_idjt'));
    var formData = {
        _token: token,
        name: name.val(),
        description: description.val(),
        salary: salary.val(),
        work_area_id: areatrabajo.val()
    };

    var url = '/job_title/' + id;
    var type = "PUT";
    var res = post_form(formData, url, type);
    if (res !== null) {
        var data = $('#tabla_jobtitle').find('tbody').find("tr[data-item='" + id + "']");
        console.log(data);
        $(data.find(".jtname")).html(res.name);
        $(data.find(".jtdescription")).html(res.description);
        $(data.find(".jtsalary")).html(res.salary);
        $(data.find(".jtwork_area_id")).html(res.work_area_id);
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
            if (res) {
                $.notify(res.responseJSON.message, error_opt);
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
        /*eliminar informacion */
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
