$("body").on("click",".edit-dep",function(){
    var url = "<?php echo base_url() ?>gesportCI/edit";
    var dep_id = $(this).val();

    $.ajax({
            url: "php/getDetalles.php?" + dataString,
                    success: function (escData) {
                        if(escData) {
                            var datos = JSON.parse(escData);
                            alert(escData);
                            alert(datos[0].dia);
                            for(i = 0; i < datos.length; i++) {
                                if(datos[i].dia == "lunes"){
                                    $("#lun").html("<li>" + datos[i].hora_inicio + "</li><li>" + datos[i].hora_fin);
                                }
                            }
                        }
                        else
                        alert("Nanay");
                    }
                });

    $.getJSON(url + '/' + dep_id, function(data) {
        $('#tp').val(data.tipo_documento);
        $('#id').val(data.cedula);
        $('#nom').val(data.nombre);
        $('#ape').val(data.apellidos);
        $('#tel').val(data.telefono);
        $('#cel').val(data.celular);
        $('#email').val(data.email);
        $('#pass').val(data.password);
        $('#deporte').val(data.deporte);
        $('#date').val(data.fecha_nacimiento);
        $('#barrio').val(data.barrio);
        $('#dir').val(data.direccion);
        $('#est').val(data.estatura);
        $('#peso').val(data.peso);
    })
});