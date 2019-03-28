$(document).ready(function(){
	function ActualizaTabla (){
		var datos="";
		$.ajax({
            data: datos,
            type: "POST",
            url: "./php/TablaDatosAnimales.php",
        })
        .done(function( data) {
            //var table=document.getElementById("tab1");
            //console.log(data);
            $("#listado").html(data);
            //$("#listado").DataTable();
            $("#listado").DataTable({
                /*"pageLenght":38,
                "paging":true,*/
                "iDisplayLength": 50,
            buttons:[
                {
                extend: 'pdf',
                text: 'Save current page',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            }
            ]
        });
            console.log("Tabla actualizada");
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            alert("No se pudo guardar la información")
        });
	}
	/*$("#btnRegAn").click(function(){
		var numero=$("#Numero").val();
		var nombre=$("#Nombre").val();
        var fecha_nacimiento=new Date($("#FechNacim").val());
        var sexo = $('#Sexo').find(":selected").text();
        var raza=$("#Raza").val();
		//console.log(fecha_nacimiento);
		//var datos={"numero":numero,"nombre":nombre};
		var datos={"numero":numero,"nombre":nombre,"Fecha_nacimiento":fecha_nacimiento,"sexo":sexo,"raza":raza};
		datos=JSON.stringify(datos);
		$.ajax({
            data: datos,
            type: "POST",
            url: "./php/Ingreso.php",
        })
        .done(function( data) {
            alert("Información almacenada satisfactoriamente");
            //}

        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            alert("No se pudo guardar la información")
        });
	});*/
	/*$("#listado").DataTable({
		buttons:[
			{
            extend: 'pdf',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
		]
	});*/
	$("#btnActualiza").click(function(){
		ActualizaTabla();
		/*var datos="hola";
		$.ajax({
            data: datos,
            type: "POST",
            url: "./php/ObtieneDatos.php",
        })
        .done(function( data) {
            var table=document.getElementById("tab1");
            console.log(data);
            $("#listado").html(data);
            $("#listado").DataTable();
            console.log("Tabla actualizada");
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            alert("No se pudo guardar la información")
        });
        for(var obj in data){
			var asignatura=data[obj].asignatura;
			var descripcion=data[obj].tipo;
			var row=table.insertRow(num);
			var cell1=row.insertCell(0);
			var cell2=row.insertCell(1);
			cell1.innerHTML=asignatura;
			cell2.innerHTML=descripcion;
			num++;
		}*/
	});
	ActualizaTabla();
    /*$("#imgAnimal").click(function(){
        $("#btnSelecFoto").click();
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imgAnimal").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#btnSelecFoto").change(function() {
        readURL(this);
    }*/



    /*$("#btnSelecFoto").change(function(){
        var reader=new FileReader();
        reader.onload=function (e){
            $("imgAnimal").attr("src",e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });*/


    /*document.getElementById("btnSelecFoto").onchange=function(){
        var reader=new FileReader();
        reader.onload=function(e){
            document.getElementById("imgAnimal").src=e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    };}*/
    /*function renderImage(file){
        var reader=new FileReader();
        reader.onload=function(event){
            var url=event.target.result;
            $("#derecha").html("<img src='"+url+"'/>");
        }
        reader.readAsDataURL(file);
    }
    $("#btnSelecFoto").click(function(){
        console.log("Imagen Subida");
        console.log(this.files);
        renderImage(this.files[0]);
    });*/



    /*$.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false                 // Default: false
    });*/



    $.uploadPreview({
        input_field: "#btnSelecFoto",   // Default: .image-upload
        preview_box: "#VistaPrevia",  // Default: .image-preview
        label_field: "#label-image",    // Default: .image-label
        label_default: "Seleccionar foto animal",   // Default: Choose File
        label_selected: "Cambiar foto de animal",  // Default: Change File
        no_label: false                 // Default: false
    });
});