$("body").on("click",".edit-dep",function(){
    var url = "http://localhost/gesportCI/edit";
    var dep_id = $(this).val();

    $.get(url + '/' + dep_id, function(data) {
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