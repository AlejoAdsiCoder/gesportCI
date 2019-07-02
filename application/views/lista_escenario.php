<div class="container-fluid">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user"></i>Lista de Escenarios deportivos
  <button type="button" data-toggle="modal" data-target="#create-esc" class="btn btn-success btn-lg">Nuevo Escenario</button>
  </div>
  <div class="card-body">
    <div class="side col-md-8">
    <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Deporte de entrenamiento</th>
                <th scope="col">Descripción</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Foto</th>
              </tr>
            </thead>
            <tbody id="show_data">
            
            </tbody>
          </table>
    </div>
    <div class="modal fade" id="edit-esc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <form action="<?php echo base_url() ?>Escenario/update" method="post">
                <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" id="id_edit" name="id">
                </div>
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre_edit" name="nombre">
                </div>
                <div class="form-group">
                <label for="deporte">Deporte de entrenamiento</label>
                <select name="deporte" class="form-control" id="deporte_edit">
                <option value="5">futbol</option>
                <option value="6">natacion</option>
                </select>
                </div>
                <div class="form-group">
                <label for="desc">Descripción</label>
                <textarea name="desc" id="desc_edit" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                <label for="disponible">Disponibilidad</label>
                <select name="disponible" class="form-control" id="disponible_edit">
                    <option value="1">Libre</option>
                    <option value="2">Ocupado</option>
                </select>
                </div>
                <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto_edit" name="foto_edit">
                </div>
                <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion_edit" name="direccion">
                </div>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary edit">Editar</button>
              </div> 
            </form>
          </div>
      </div>
  </div>
  <div class="modal fade" id="del-esc" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrar esc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <strong>Esta seguro de que desea borrar este esc?</strong>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="esc_delete" id="esc_delete" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" type="submit" id="delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
        </div>
  <!--- Modal CREAR --->
  <div class="modal fade" id="create-esc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear esc</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" id="dataesc" method="post">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                <label for="deporte">Deporte de entrenamiento</label>
                <select name="deporte" class="form-control" id="deporte">
                <option value="5">futbol</option>
                <option value="6">natacion</option>
                </select>
                </div>
                <div class="form-group">
                <label for="desc">Descripción</label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                <label for="disponible">Disponibilidad</label>
                <select name="disponible" class="form-control" id="disponible">
                    <option value="1">Libre</option>
                    <option value="2">Ocupado</option>
                </select>
                </div>
                <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
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

    show_esc();

    $("body").on("click",".edit-esc",function() {
    var url = '<?php echo base_url() ?>Escenario/edit';
    
    var esc_id = $(this).val();
    alert(url + '/' + esc_id);

     $.ajax({
        url: url + '/' + esc_id,
        success: function (data) {
        if(data) {
            var datos = JSON.parse(data);
            $('#id_edit').val(datos.id);
            $('#nombre_edit').val(datos.nombre);
            $('#deporte_edit').val(datos.deporte);
            $('#desc_edit').val(datos.descripcion);
            $('#disponible_edit').val(datos.disponibilidad);
            $('#foto_edit').val(datos.foto);
            $('#direccion_edit').val(datos.direccion);
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
        var desc = $('#desc_edit').val();
        var dis = $('#disponible_edit').val();
        var foto = $('#foto_edit').val();
        var dir = $('#direccion_edit').val();
        alert(id+''+nombre+''+deporte+''+desc+''+dis+''+foto+''+dir);
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '<?php echo base_url() ?>Escenario/update/' + id,
            data:{nombre:nombre, deporte:deporte, desc:desc, dis:dis, dir:dir},
            }).done(function(data){
                alert(data);
            $("#edit-esc").modal('hide');
            show_esc();
            
            });

    });



     // Crear esc
     $('#dataesc').on('submit', function(e) {
        e.preventDefault();
/*
        var nombre = $('#nombre').val();
        var deporte = $('#deporte').val();
        var descripcion = $('#descripcion').val();
        var disponible = $('#disponible').val();
        var direccion = $('#direccion').val();
        var foto = $('#foto').val();
        */

        $.ajax({

            type:'POST',
            url: '<?php echo base_url() ?>Escenario/nuevoEsc',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,

            //data:{nombre:nombre, deporte:deporte, fecha:fecha, cupo:cupo, estado:estado, entrenador:entrenador},
            
            }).done(function(data) {
            $("#create-esc").modal('hide');
            show_esc();
            
            });
        
    });


function show_esc() {
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url() ?>Escenario/lista',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i < data.length; i++){
                      
                        html += '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].nombre+'</td>'+
                        '<td>'+data[i].deporte+'</td>'+
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td>'+data[i].disponibilidad+'</td>'+
                        '<td>'+data[i].direccion+'</td>'+
                        '<td>'+'<img src="'+data[i].foto+'" width="90" height="90">'+'</td>'+
                        //'<td>'+'<img src="'+''+data[i].foto+'" width="90" height="90">'+'</td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#edit-esc" class="btn btn-primary edit-esc" value="'+data[i].id+'"><i class="far fa-edit"></i></button></td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#del-esc" class="btn btn-danger del-esc" value="'+data[i].id+'"><i class="far fa-trash-alt"></i></button></td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
}

//get data for delete record
$("body").on("click",".del-esc",function() {
    var code = $(this).val();
    $('[name="esc_delete"]').val(code);
});

//delete record to database
$('#delete').on('click',function(){
    var id = $('#esc_delete').val();
   
    $.ajax({
        type : "POST",
        url  : "<?php echo base_url() ?>Escenario/delete",
        dataType : "JSON",
        data : {id:id},
        success: function(data) {
            $('[name="esc_delete"]').val("");
            $('#del-esc').modal('hide');
            show_esc();
        }
    });
    return false;
});

});
</script>
</body>