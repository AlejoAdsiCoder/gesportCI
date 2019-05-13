<div class="container-fluid">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user"></i>Lista de Clubes
  <button type="button" data-toggle="modal" data-target="#create-club" class="btn btn-success btn-lg">Nuevo Club</button>
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
    <div class="modal fade" id="edit-club" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <form action="<?php echo base_url() ?>Club/update" method="post">
                <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" id="id_edit" name="id">
                </div>
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre_edit" name="nombre">
                </div>
                <div class="form-group">
                <label for="deporte">Deporte</label>
                <select name="deporte" class="form-control" id="deporte_edit"></select>
                </div>
                <div class="form-group">
                <label for="">Fecha</label>
                <input type="date" class="form-control" name="fecha_registro" id="fecha_registro_edit">
                </div>
                <div class="form-group">
                <label for="">Cupo</label>
                <input type="text" class="form-control" name="cupo" id="cupo_edit">
                </div>
                <div class="form-group">
                <label for="">Estado</label>
                <input type="text" class="form-control" name="estado" id="estado_edit">
                </div>
                <div class="form-group">
                <label for="">Entrenador</label>
                <select name="entrenador" class="form-control" id="entrenador_edit"></select>
                </div>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary edit">Editar</button>
              </div> 
            </form>
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
  <!--- Modal CREAR --->
  <div class="modal fade" id="create-club" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear club</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <form action="<?php echo base_url(); ?>Club/nuevo" method="post">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                <label for="deporte">Deporte</label>
                <select name="deporte" class="form-control" id="deporte">
                    <option value="5">baloncesto</option>
                </select>
                </div>
                <div class="form-group">
                <label for="">Fecha</label>
                <input type="date" class="form-control" name="fecha_registro" id="fecha_registro">
                </div>
                <div class="form-group">
                <label for="">Cupo</label>
                <input type="text" class="form-control" name="cupo" id="cupo">
                </div>
                <div class="form-group">
                <label for="">Estado</label>
                <input type="text" class="form-control" name="estado" id="estado">
                </div>
                <div class="form-group">
                <label for="">Entrenador</label>
                <select name="entrenador" class="form-control" id="entrenador">
                <option value="52345">Edwin</option></select>
                </div>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" id="btnguardar" class="btn btn-primary">Crear</button>
              </div>
              </form>
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

    show_club();

    $("body").on("click",".edit-club",function() {
    var url = '<?php echo base_url() ?>Club/edit';
    
    var club_id = $(this).val();
    alert(url + '/' + club_id);

     $.ajax({
        url: url + '/' + club_id,
        success: function (data) {
          alert(data);
        if(data) {
            var datos = JSON.parse(data);
            $('#id').val(datos.id);
            $('#nombre').val(datos.nombre);
            $('#deporte').val(datos.deporte_entrenamiento);
            $('#fecha_registro').val(datos.fecha_registro);
            $('#cupo').val(datos.cupo);
            $('#estado').val(datos.estado);
            $('#entrenador').val(datos.entrenador_cedula);
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
        
        var id = $('#id_edit').val();
        var nombre = $('#nombre_edit').val();
        var deporte = $('#deporte_edit').val();
        var fecha = $('#fecha_registro_edit').val();
        var cupo = $('#cupo_edit').val();
        var estado = $('#estado_edit').val();
        var entrenador = $('#entrenador_edit').val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '<?php echo base_url() ?>Club/update/' + id,
            data:{nombre:nombre, deporte:deporte, fecha:fecha, cupo:cupo, estado:estado},
            }).done(function(data){

            $("#edit-club").modal('hide');
            show_club();
            
            });

    });



     // Crear club
     $("#btnguardar").click(function(e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var deporte = $('#deporte').val();
        var fecha = $('#fecha_registro').val();
        var cupo = $('#cupo').val();
        var estado = $('#estado').val();
        var entrenador = $('#entrenador').val();

        $.ajax({

            type:'POST',
            url: '<?php echo base_url() ?>Club/nuevo',
            dataType: "JSON",
            data:{nombre:nombre, deporte:deporte, fecha:fecha, cupo:cupo, estado:estado, entrenador:entrenador},
            
            }).done(function(data){
            alert(data);
            $("#create-club").modal('hide');
            show_ents();
            
            });
        
    });


function show_club() {
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
                        '<td>'+data[i].entrenador_cedula+'</td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#edit-club" class="btn btn-primary edit-club" value="'+data[i].id+'"><i class="far fa-edit"></i></button></td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#del-club" class="btn btn-primary del-club" value="'+data[i].id+'"><i class="far fa-delete"></i></button></td>'+
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