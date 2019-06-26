<div class="container-fluid">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user"></i>Lista de Reservas
  
</div>
  <div class="card-body">
    <div class="side col-md-8">
    <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">club</th>
                <th scope="col">escenario</th>
                <th scope="col">descripción</th>
                <th scope="col">Fecha hora inicio</th>
                <th scope="col">Fecha hora fin</th>
                <th scope="col">Estado</th>
                <th scope="col">Aprobación</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody id="show_data">
            
            </tbody>
          </table>
    </div>
    <div class="modal fade" id="edit-res" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <form action="<?php echo base_url(); ?>Deportista/update/" method="post">
                    
                    <div class="form-group col"> 
                        <label for="">Seleccionar Club</label>
                        <select name="club" class="form-control" id="club">
                            <option value="0">-- Seleccione --</option>
                        <?php 
                            foreach ($listclub as $row) {
                            echo '<option value='.$row->id.'>'.$row->nombre.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="escenario">Seleccionar escenario</label>
                        <select name="escenario" class="form-control" id="escenario">
                            <option value="0">-- Seleccione --</option>
                            <?php 
                                foreach ($listesc as $row) {
                                    echo '<option value='.$row->id.'>'.$row->nombre.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="horaini">hora Inicio:</label>
                        <input type="time" min="9:00" max="18:00" id="horaini" name="horaini" class="form-control">
                    </div>
                    <div class="col">
                        <label for="horafin">hora Fin:</label>
                        <input type="time" min="9:00" max="18:00" id="horafin" name="horafin" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <input type="hidden" value="1" name="estado" id="estado" class="form-control">
                    </div>
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
      <div class="modal fade" id="del-dep" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrar Reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <strong>Esta seguro de que desea borrar esta reserva?</strong>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    /* Datos Editar */

    show_events();

    $("body").on("click",".edit-dep",function() {
    var url = '<?php echo base_url() ?>Reserva/edit';
    
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

    // Lista Reservas
    function show_events() {
        $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url() ?>Reserva/res_data',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i < data.length; i++){
                      
                        html += '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].club_id+'</td>'+
                        '<td>'+data[i].escenario_id+'</td>'+
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td>'+data[i].fecha_hora_inicio+'</td>'+
                        '<td>'+data[i].fecha_hora_fin+'</td>'+
                        '<td>'+data[i].estado+'</td>'+
                        '<td>'+'<select id="state"><option value></option></select>+'</td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#edit-dep" class="btn btn-primary edit-dep" value="'+data[i].id+'"><i class="far fa-edit"></i></button></td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#del-dep" class="btn btn-primary del-dep" value="'+data[i].id+'"><i class="far fa-delete"></i></button></td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
    }
});
</script>