$(document).ready(function(){
	function ActualizaTabla (){
		var datos="";
		$.ajax({
            data: datos,
            type: "POST",
            url: "./php/TablaDatosAnimales.php",
        })
        .done(function( data) {
            $("#listado").html(data);
            var table=$("#listado").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
            console.log("Tabla actualizada");
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            alert("No se pudo guardar la información")
        });
	}
	$("#btnActualiza").click(function(){
		ActualizaTabla();
	});
	ActualizaTabla();


    $.uploadPreview({
        input_field: "#btnSelecFoto",   // Default: .image-upload
        preview_box: "#VistaPrevia",  // Default: .image-preview
        label_field: "#label-image",    // Default: .image-label
        label_default: "Seleccionar foto animal",   // Default: Choose File
        label_selected: "Cambiar foto de animal",  // Default: Change File
        no_label: false                 // Default: false
    });
});