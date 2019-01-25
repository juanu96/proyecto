
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

    /* elimnar numero Worker */
    function deletenumber() {
        /* $(this).attr('data-id') obtenemos el id de el elemento que
   queremeos eliminar a traves de la funcion bind */
       var id = $(this).attr('data-id');
       var url = '/number/' + id;//asignamos la url mas id que tiene que buscar para eliminar
       var res = delete_data(url);//a la funcion delete_data le mandamos la url para que ejecute el ajax y elimine
       if (res !== null) {//verificamos que la respuesta no sea nula
           var data = $('#tabla_telefonos').find('tbody').find("tr[data-item='" + id + "']");//buscamos el elemento que queremos eliminar en nuestra tabla usando el id
           console.log(id);
           data.remove()// usamos la funcion remove() para quitar el elemento buscado de nuestra tabla
           console.log(data);            
       }
   }

           /* editar numero trabajador */
           function editnumber() {
            $("#numberedit").removeClass("hide");
            $(".cancelar").removeClass("hide");
            $("#guardarnumber").addClass("hide"); 
            $(this).parents("tr").find("td:eq(0)").each(function(){
                number=$(this).html();                
            });
            var id = $(this).attr('data-id');
            $("#number").val(number);        
            $("#idnumber").val(id);
            }

            /* elimnar email Worker */
    function deleteemail() {
        /* $(this).attr('data-id') obtenemos el id de el elemento que
   queremeos eliminar a traves de la funcion bind */
       var id = $(this).attr('data-id');
       var url = '/email/' + id;//asignamos la url mas id que tiene que buscar para eliminar
       var res = delete_data(url);//a la funcion delete_data le mandamos la url para que ejecute el ajax y elimine
       if (res !== null) {//verificamos que la respuesta no sea nula
           var data = $('#tabla_email').find('tbody').find("tr[data-item='" + id + "']");//buscamos el elemento que queremos eliminar en nuestra tabla usando el id
           console.log(id);
           data.remove()// usamos la funcion remove() para quitar el elemento buscado de nuestra tabla
           console.log(data);            
       }
   }

           /* editar numero trabajador */
           function editemail() {
            $("#emailedit").removeClass("hide");
            $(".cancelar").removeClass("hide");
            $("#guardaremail").addClass("hide"); 
            $(this).parents("tr").find("td:eq(0)").each(function(){
                email=$(this).html();                
            });
            var id = $(this).attr('data-id');
            $("#email").val(email);        
            $("#idemail").val(id);
            }
    //-----------------------fin funciones Bind---------------------------------------------------------------------

    /*  //-----------Workers----------------------------------------------------------------------------------------------------   */
        
            /* //Metodo crear email workers */
        $("#formularioworkeremail").on("submit", function(e){            
            e.preventDefault(); 
            var form = $(this);            
            var formData = new FormData(form[0]);
            var url = '/email';
            var type = 'POST';

            var res = postData(formData, url, type);
            if (res !== null) {
                var	row ='<tr data-item="'+res.id+'">'+
                '<td class="workeremail">'+res.email+'</td>' +
                '<td>'+
                '<a href="#" class="glyphicon glyphicon-pencil emailedit_1" aria-hidden="true" name="editar" data-id="'+res.id+'" data-name="'+res.email+'"></a>'+
                '<a href="" data-toggle="modal"  class="glyphicon glyphicon-trash emaildelete" aria-hidden="true" style="margin-left: 20px" data-id="'+res.id+'"></a>'+
                '</td>'+
                '</tr>';
                $("#tabla_email tr:last").after(row);   
                $("#formularioworkeremail").trigger("reset");                            
                $(".emaildelete").bind("click", deleteemail);
                $(".emailedit_1").bind("click", editemail);
            }
        });

        /*  //Metodo actualizar email de trabajadores */
        
        $("#emailedit").on("click", function(e){
            e.preventDefault(); 
            
            var form = $('#formularioworkeremail');
            var id = form.find($('#idemail')).val();
            var email = form.find($('#email'));
            var worker_id = form.find($('#worker_ide'));
            var formData = {
                _token: token,
                email: email.val(),
                worker_ide: worker_id.val()
            };
            console.log(id, formData);
            var url = '/email/' + id;
            var type = "PUT";
            var res = post_form(formData, url, type);
            console.log(res);
            if (res !== null) {
                var data = $('#tabla_email').find('tbody').find("tr[data-item='" + id + "']");
                console.log(data);
                $(data.find(".workeremail")).html(res.email);
                $("#guardaremail").removeClass("hide");
                $("#emailedit").addClass("hide");
                $(".cancelar").addClass("hide");
                $("#formularioworkeremail").trigger("reset");      
            }
                    
            });

        /*  //Metodo eliminar para email de trabajadores */
        $(".emaildelete").on("click", function(e){  
            var id = $(this).attr('data-id');
            var url = '/email/' + id;
            var res = delete_data(url);
            if (res !== null) {
                var data = $('#tabla_email').find('tbody').find("tr[data-item='" + id + "']");
                data.remove();
            }   
        
        });

    /* //Metodo crear number workers */
        $("#formularioworkernumber").on("submit", function(e){            
            e.preventDefault(); 
            var form = $(this);            
            var formData = new FormData(form[0]);
            var url = '/number';
            var type = 'POST';

            var res = postData(formData, url, type);
            if (res !== null) {
                var	row ='<tr data-item="'+res.id+'">'+
                '<td class="workernumber">'+res.number+'</td>' +
                '<td>'+
                '<a href="#" class="glyphicon glyphicon-pencil editarat_1" aria-hidden="true" name="editar" data-id="'+res.id+'" data-name="'+res.number+'"></a>'+
                '<a href="" data-toggle="modal"  class="glyphicon glyphicon-trash numberdelete" aria-hidden="true" style="margin-left: 20px" data-id="'+res.id+'"></a>'+
                '</td>'+
                '</tr>';
                $("#tabla_telefonos tr:last").after(row);   
                $("#formularioworkernumber").trigger("reset");                            
                $(".numberdelete").bind("click", deletenumber);
                $(".editarat_1").bind("click", editnumber);
            }
        });

        /*  //Metodo actualizar numero de trabajadores */
        $("#numberedit").on("click", function(e){
            e.preventDefault(); 
            
            var form = $('#formularioworkernumber');
            var id = form.find($('#idnumber')).val();
            var number = form.find($('#number'));
            var worker_id = form.find($('#worker_id'));
            var formData = {
                _token: token,
                number: number.val(),
                worker_id: worker_id.val()
            };
            console.log(id);
            var url = '/number/' + id;
            var type = "PUT";
            var res = post_form(formData, url, type);
            if (res !== null) {
                var data = $('#tabla_telefonos').find('tbody').find("tr[data-item='" + id + "']");
                console.log(data);
                $(data.find(".workernumber")).html(res.number);
                $("#guardarnumber").removeClass("hide");
                $("#numberedit").addClass("hide");
                $(".cancelar").addClass("hide");
                $("#formularioworkernumber").trigger("reset");      
            }
                    
            });

        /*  //Metodo eliminar para numeros de trabajadores */
        $(".numberdelete").on("click", function(e){  
            var id = $(this).attr('data-id');
            var url = '/number/' + id;
            var res = delete_data(url);
            if (res !== null) {
                var data = $('#tabla_telefonos').find('tbody').find("tr[data-item='" + id + "']");
                data.remove();
            }   
        
        });
       
 /*  //----------------------Work Areas-----------------------------------------------------------------------------------------   */
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
                    $("#formularioAT").trigger("reset");                            
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
                $("#formularioAT").trigger("reset");      
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
        $("#formulariojt").trigger("reset"); 
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
        $(".guardarjt").removeClass("hide");
        $("#editarjt").addClass("hide");
        $(".cancelar").addClass("hide");
        $("#formulariojt").trigger("reset");
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
    $('.DataTablejs').DataTable({
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
        $(".guardarjt").removeClass("hide");
        $("#guardaremail").removeClass("hide");
        $("#emailedit").addClass("hide");
        $(".editarjt").addClass("hide");             
        $("#formularioworkeremail").trigger("reset");
        $("#formularioworkernumber").trigger("reset");
        $("#formulariojt").trigger("reset");
        $("#formularioAT").trigger("reset"); 
            
    }); 

    $(".cancelar").click(function(){
        $("#guardarAT").removeClass("hide");
        $(".guardarjt").removeClass("hide");
        $("#guardarnumber").removeClass("hide");
        $("#guardaremail").removeClass("hide");
        $("#editarAT").addClass("hide");
        $(".editarjt").addClass("hide");
        $("#numberedit").addClass("hide");
        $("#emailedit").addClass("hide");
        $(".cancelar").addClass("hide");
        $("#formularioAT").trigger("reset");     
        $("#formulariojt").trigger("reset");       
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

    $(".numberedit1").click(function(){
        $("#numberedit").removeClass("hide");
        $(".cancelar").removeClass("hide");
        $("#guardarnumber").addClass("hide"); 
        $(this).parents("tr").find("td:eq(0)").each(function(){
            number=$(this).html();                
        });
        var id = $(this).attr('data-id');
        $("#number").val(number);        
        $("#idnumber").val(id);
                 
    });

    $(".emailedit1").click(function(){
        $("#emailedit").removeClass("hide");
        $(".cancelar").removeClass("hide");
        $("#guardaremail").addClass("hide"); 
        $(this).parents("tr").find("td:eq(0)").each(function(){
            email=$(this).html();                
        });
        var id = $(this).attr('data-id');
        $("#email").val(email);        
        $("#idemail").val(id);
                 
    });

    
    $(".select2js").select2({
        placeholder: "Selecciona un departamento",
        language: {

            noResults: function() {
        
              return "No hay resultado";        
            },
            searching: function() {
        
              return "Buscando..";
            }
          }
    });
    
    
           $('.datepickerjs').datepicker({
            language: 'es',
            format: 'dd/mm/yyyy',
            orientation: "auto left",
            forceParse: false,
            autoclose: true,
            todayHighlight: true,
            toggleActive: true,
            endDate: '0',
        }); 
    
        /* $('.workerjs').on('click', function() {
            $.ajax({
                url : "/worker",
                dataType: "text",
                success : function (data) {
                    $(".paneldecontenido").html(data);
                    console.log(data);
                }
            });
        });  */


//---------------------------------------------------------------------------------------------------
       
     /* //ACA le asigno el evento click a cada boton de la clase bt_plus y llamo a la funcion addField
		$(".bt_plus").each(function (el){
			$(this).bind("click",addField);
									 });
 
 
function addField(){
// ID del elemento div quitandole la palabra "div_" de delante. Pasi asi poder aumentar el número. Esta parte no es necesaria pero yo la utilizaba ya que cada campo de mi formulario tenia un autosuggest , así que dejo como seria por si a alguien le hace falta.
 
var clickID = parseInt($(this).parent('div').attr('id').replace('div_',''));
 
// Genero el nuevo numero id
var newID = (clickID+1);
 
// Creo un clon del elemento div que contiene los campos de texto
$newClone = $('#div_'+clickID).clone(true);
 
//Le asigno el nuevo numero id
$newClone.attr("id",'div_'+newID);
 
//Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("input").eq(0).attr("id",'materiales'+newID).val('');
 
//Borro el valor del segundo campo input(este caso es el campo de cantidad)
$newClone.children("input").eq(1).val('');
 
//Asigno nuevo id al boton
$newClone.children("input").eq(2).attr("id",newID)
 
//Inserto el div clonado y modificado despues del div original
$newClone.insertAfter($('#div_'+clickID));
 
//Cambio el signo "+" por el signo "-" y le quito el evento addfield
$("#"+clickID).val('-').unbind("click",addField);
 
//Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
$("#"+clickID).bind("click",delRow);					
 
}
 
 
function delRow() {
// Funcion que destruye el elemento actual una vez echo el click
$(this).parent('div').remove();} */
/* //-------------------------------------------------------------------------------------
$(".bt_plus").each(function (el){
			$(this).bind("click",addField);
		});
 
 
function addField(){
// ID del elemento div quitandole la palabra "div_" de delante. 
//Pasi asi poder aumentar el número. Esta parte no es necesaria pero yo la utilizaba ya que cada campo de mi formulario 
//tenia un autosuggest , así que dejo como seria por si a alguien le hace falta.
 
var clickID = parseInt($(this).parent('div').attr('id').replace('div_',''));
console.log(clickID);
 
// Genero el nuevo numero id
var newID = (clickID+1);
 
// Creo un clon del elemento div que contiene los campos de texto
$newClone = $('#div_'+clickID).clone(true);

//Le asigno el nuevo numero id
$newClone.attr("id",'div_'+newID);
 
//Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo 
//que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("input").eq(0).attr("id",'materiales'+newID).val('');
  
//Asigno nuevo id al boton
$newClone.children("input").eq(1).attr("id",newID)
 
//Inserto el div clonado y modificado despues del div original
$newClone.insertAfter($('#div_'+clickID));
 
//Cambio el signo "+" por el signo "-" y le quito el evento addfield
$("#"+clickID).val('-').unbind("click",addField);
 
//Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
$("#"+clickID).bind("click",delRow);					
 
}
 
function delRow() {
// Funcion que destruye el elemento actual una vez echo el click
$(this).parent('div').remove();}
//-*------------------------------------------------------------------------------
 */

 //-------------------------------------------------------------------------------------
$(".bt_plus").each(function (el){
    $(this).bind("click",addField);
});


function addField(){
// ID del elemento div quitandole la palabra "div_" de delante. 
//Pasi asi poder aumentar el número. Esta parte no es necesaria pero yo la utilizaba ya que cada campo de mi formulario 
//tenia un autosuggest , así que dejo como seria por si a alguien le hace falta.

var clickID = parseInt($(this).parent('div').attr('id').replace('div_',''));
console.log(clickID);

// Genero el nuevo numero id
var newID = (clickID+1);

// Creo un clon del elemento div que contiene los campos de texto
$newClone = $('#div_'+clickID).clone(true);

//Le asigno el nuevo numero id
$newClone.attr("id",'div_'+newID);

//Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo 
//que hayas escrito.(igual que antes no es necesario tener un id)
$newClone.children("input").eq(0).attr("id",'materiales'+newID).val('');

//Asigno nuevo id al boton
$newClone.children("input").eq(1).attr("id",newID)

//Inserto el div clonado y modificado despues del div original
$newClone.insertAfter($('#div_'+clickID));

//Cambio el signo "+" por el signo "-" y le quito el evento addfield
$("#"+clickID).val('-').unbind("click",addField).removeClass("btn-primay").addClass("btn-danger");

//Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
$("#"+clickID).bind("click",delRow);					

}

function delRow() {
// Funcion que destruye el elemento actual una vez echo el click
$(this).parent('div').remove();}
//-*------------------------------------------------------------------------------

 
 
 