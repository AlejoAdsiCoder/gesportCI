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
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody id="show_data">
            
            </tbody>
          </table>
    </div>
     <!--- Modal ElIMINAR --->
     <div class="modal fade" id="del-res" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrar Reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <strong>Esta seguro de que desea borrar esta Reserva?</strong>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="entrenador_delete" id="entrenador_delete" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" type="submit" id="delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
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
            <form action="<?php echo base_url(); ?>Reserva/update/" method="post">
                    
                        <input type="none" id="id" class="form-control" name="id">
                    
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
                <?php if(isset($_SESSION['a_nombre'])) { ?>
                <div class="form-group col">
                        <label for="estado">Cambiar Estado</label>
                        <select name="estado" class="form-control" id="estado">
                            <option value='1'>Pendiente</option>
                            <option value='2'>Aprobado</option>
                            <option value='3'>Realizado</option>
                        </select>
                    </div>
                <?php } ?>
                  
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary edit">Editar</button>
              </div>
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

    $("body").on("click",".edit-res",function() {
    var url = '<?php echo base_url() ?>Reserva/edit';
    
    var dep_id = $(this).val();

     $.ajax({
        url: url + '/' + dep_id,
        success: function (data) {
          var datos = JSON.parse(data);
          var fecha = datos.fecha_hora_inicio.split(' ');
          var fecha2 = datos.fecha_hora_fin.split(' ');
/*        var t = new date(data[i].start);
        var h = addZero(t.getHours());
        var m = addZero(t.getMinutes());
        var s = addZero(t.getSeconds());
        */
        if(data) {
            alert(data);
            var datos = JSON.parse(data);
                $('#id').val(datos.id);
                $('#club').val(datos.club_id);
                $('#escenario').val(datos.escenario_id);
                $('#descripcion').val(datos.descripcion);
                $('#fecha').val(fecha[0]);
                $('#horaini').val(fecha[1]);
                $('#horafin').val(fecha2[1]);
                $('#estado').val(datos.estado);
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
                    var opt = '';
                    var i;


                    for(i=0; i < data.length; i++){
                        var state = '';
                        switch(data[i].estado) {
                            case '1': 
                                state = 'Pendiente Aprobración';
                                break;
                            case '2':
                                state = 'Aprobado';
                                break;
                            case '3':
                                state = 'Realizado';
                                break;
                            default:
                                state = '0';
                                break;
                        }

                        html += '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].club+'</td>'+
                        '<td>'+data[i].escenario+'</td>'+
                        '<td>'+data[i].title+'</td>'+
                        '<td>'+data[i].start+'</td>'+
                        '<td>'+data[i].end+'</td>'+
                        '<td>'+state+'</td>'+
                        '<td>'+'<button data-toggle="modal" data-target="#edit-res" class="btn btn-primary edit-res" value="'+data[i].id+'"><i class="far fa-edit"></i></button>'+'<button data-toggle="modal" data-target="#del-res" class="btn btn-danger del-res" value="'+data[i].id+'"><i class="far fa-trash-alt"></i></button></td>'+
                        '</tr>';
                        
                       

                    }
                    $('#show_data').html(html);


                }
 
            });
    }

    $(".edit").click(function(e){

        e.preventDefault();

        var id = $("#id").val();
        var escenario = $("#escenario").val();
        var club = $("#club").val();
        var descripcion = $("#descripcion").val();
        var fecha = $("#fecha").val();
        var hini = $("#horaini").val();
        var hfin = $("#horafin").val();
        var fh_inicio = fecha+" "+hini;
        var fh_fin = fecha+" "+hfin;
        var estado = $("#estado").val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '<?php echo base_url() ?>Reserva/update/' + id,
            data: {club:club, escenario:escenario, descripcion:descripcion, 
            fh_inicio:fh_inicio, fh_fin:fh_fin, estado:estado},
            }).done(function(data){

            $("#edit-res").modal('hide');
            show_events();
            
            });

        });

        //get data for delete record
        $("body").on("click",".del-res",function() {
            var code = $(this).val();
            $('[name="entrenador_delete"]').val(code);
        });

        //delete record to database
        $('#delete').on('click',function() {
            var id = $('#entrenador_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url() ?>Reserva/delete",
                dataType : "JSON",
                data : {id:id},
                success: function(data) {
                    $('[name="entrenador_delete"]').val("");
                    $('#del-res').modal('hide');
                    show_events();
                }
            });
            return false;
        });
});

$(".state").change(function() {
    alert('hola');
    var id = $(this).children(":selected").attr("id");
    var status = $(this).find(":selected").val();
    console.log("asdfa");
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>Reserva/upState/"+id,
        data: {status:status},
        success: function(data) 
        {
            console.log("asdfa");
            if(data) {
                alert(data);
            }
            else {
                alert(error);
            }
        }
    });
});



</script>