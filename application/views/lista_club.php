<div class="container-fluid">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user"></i>Lista de Clubes
  <button type="button" class="btn btn-success btn-lg">Nuevo Deportista</button>
  </div>
  <div class="card-body">
    <div class="side col-md-8">
    <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Deporte de entrenamiento</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Cupo</th>
                <th scope="col">Estado</th>
                <th scope="col">Entrenador encargado</th>
              </tr>
            </thead>
            <tbody id="show_data">
            
            </tbody>
          </table>
    </div>
    <div class="modal fade" id="edit-dep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <form action="<?php echo base_url() ?>Entrenador/nuevoEntrenador" method="post">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                <label for="deporte">Deporte</label>
                <select name="deporte" class="form-control" id="deporte"></select>
                </div>
                <div class="form-group">
                <label for="">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha_registro">
                </div>
                <div class="form-group">
                <label for="">Cupo</label>
                <input type="text" class="form-control" name="cupo" id="cupo">
                </div>
                <input type="submit" class="btn btn-secondary" name="submit" value="Crear">
            </form>
            </div>
          </div>
      </div>
      <div class="modal fade" id="del-dep" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrar club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <strong>Esta seguro de que desea borrar este club?</strong>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="deportista_delete" id="deportista_delete" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" type="submit" id="delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
        </div>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    /* Datos Editar */

    show_deport();

    $("body").on("click",".edit-dep",function() {
    var url = '<?php echo base_url() ?>Deportista/edit';
    
    var dep_id = $(this).val();
    alert(url + '/' + dep_id);

     $.ajax({
        url: url + '/' + dep_id,
        success: function (data) {
          alert(data);
        if(data) {
            var datos = JSON.parse(data);
                $('#tp').val(datos.tipo_documento);
                $('#id').val(datos.cedula);
                $('#nom').val(datos.nombre);
                $('#ape').val(datos.apellidos);
                $('#tel').val(datos.telefono);
                $('#cel').val(datos.celular);
                $('#email').val(datos.email);
                $('#pass').val(datos.password);
                $('#deporte').val(datos.deporte);
                $('#date').val(datos.fecha_nacimiento);
                $('#barrio').val(datos.barrio);
                $('#dir').val(datos.direccion);
                $('#est').val(datos.estatura);
                $('#peso').val(datos.peso);
                }
            else
                alert("Nanay");
            }
        }).fail(function(xhr, status, error)
        { 
            console.log(xhr); 
            console.log(status); 
            console.log(error); 
        });
    });

    $(".edit").click(function(e){


        e.preventDefault();

        var tipo_documento = $('#tp').val();
        var cedula = $('#id').val();
        var nombre = $('#nom').val();
        var apellidos = $('#ape').val();
        var telefono = $('#tel').val();
        var celular = $('#cel').val();
        var email = $('#email').val();
        var password = $('#pass').val();
        var deporte = $('#deporte').val();
        var fecha_nacimiento = $('#date').val();
        var barrio = $('#barrio').val();
        var direccion = $('#dir').val();
        var estatura =$('#est').val();
        var peso = $('#peso').val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '<?php echo base_url() ?>Deportista/update/' + cedula,
            data:{tipo_documento:tipo_documento,cedula:cedula, nombre:nombre, apellidos:apellidos, telefono:telefono,
                  celular:celular, email:email, password:password, deporte:deporte, fecha_nacimiento:fecha_nacimiento,
                  barrio:barrio, direccion:direccion, estatura:estatura, peso:peso},
            }).done(function(data){

            $("#edit-dep").modal('hide');
            show_deport();
            
            });

    });

function show_deport() {
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url() ?>Club/lista',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i < data.length; i++){
                      
                        html += '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].nombre+'</td>'+
                        '<td>'+data[i].deporte_entrenamiento+'</td>'+
                        '<td>'+data[i].fecha_registro+'</td>'+
                        '<td>'+data[i].cupo+'</td>'+
                        '<td>'+data[i].estado+'</td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#edit-club" class="btn btn-primary edit-dep" value="'+data[i].id+'"><i class="far fa-edit"></i></button></td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#del-club" class="btn btn-primary del-dep" value="'+data[i].id+'"><i class="far fa-delete"></i></button></td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
}

//get data for delete record
$("body").on("click",".del-dep",function() {
    var code = $(this).val();
    $('[name="deportista_delete"]').val(code);
});

//delete record to database
$('#delete').on('click',function(){
    var code = $('#deportista_delete').val();
    $.ajax({
        type : "POST",
        url  : "<?php echo base_url() ?>Deportista/delete",
        dataType : "JSON",
        data : {cedula:code},
        success: function(data) {
            alert(data);
            $('[name="deportista_delete"]').val("");
            $('#del-dep').modal('hide');
            show_deport();
        }
    });
    return false;
});

});
</script>
</body>