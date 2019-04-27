<div class="container-fluid">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user"></i>Lista de Deportistas
  <button type="button" class="btn btn-success btn-lg">Nuevo Deportista</button>
  </div>
  <div class="card-body">
    <div class="side col-md-8">
    <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col"># Cédula</th>
                <th scope="col">Tipo documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Celular</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Barrio</th>
                <th scope="col">Dirección</th>
                <th scope="col">Deporte</th>
                <th scope="col">Password</th>
                <th scope="col">Fecha_registro</th>
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
            <form action="<?php echo base_url(); ?>Deportista/update/" method="post">
                    
            <div class="form-group">
                <label for="">Tipo documento</label>
                <select class="form-control" id="tp" name="tipodoc">
                    <option value="cc">Cédula de ciudadania</option>
                    <option value="ti">Tarjeta de identidad</option>
                    <option value="ce">Cédula de extranjeria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Número identificación</label>
                <input type="text" id="id" value="" class="form-control" name="cedula">
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="">Nombre</label>
                    <input type="text" id="nom" name="nombres" value="" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="">Apellidos</label>
                    <input type="text" id="ape" name="apellidos" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Correo Electrónico</label>
                <input type="text" id="email" name="email" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Teléfono</label>
                <input type="text" id="tel" name="tel" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Celular</label>
                <input type="text" id="cel" name="cel" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Fecha nacimiento</label>
                <input type="date" id="date" class="form-control" value="" name="fechanac">
            </div>
            <div class="form-group">
                <label for="">Barrio</label>
                <input type="text" id="barrio" class="form-control" value="" name="barrio">
            </div> 
            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" id="dir" class="form-control" value="" name="direccion">
            </div> 
            <div class="form-group">
                <label for="">Deporte</label>
                <select name="deporte" id="deporte" name="deporte" class="form-control">
                    <option value="1">Baloncesto</option>
                    <option value="2">Futbol</option>
                    <option value="3">Natación</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" id="pass" name="pass" value="" class="form-control">
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
                <h5 class="modal-title" id="exampleModalLabel">Borrar deportista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <strong>Esta seguro de que desea borrar este usuario?</strong>
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

    show_ents();

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

        var cedula = $('#id').val();
        var tipo_documento = $('#tp').val();
        var nombre = $('#nom').val();
        var apellidos = $('#ape').val();
        var email = $('#email').val();
        var telefono = $('#tel').val();
        var celular = $('#cel').val();
        var fecha_nacimiento = $('#date').val();
        var barrio = $('#barrio').val();
        var direccion = $('#dir').val();
        var deporte = $('#deporte').val();
        var password = $('#pass').val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: '<?php echo base_url() ?>Deportista/update/' + cedula,
            data:{tipo_documento:tipo_documento,cedula:cedula, nombre:nombre, apellidos:apellidos, telefono:telefono,
                  celular:celular, email:email, password:password, deporte:deporte, fecha_nacimiento:fecha_nacimiento,
                  barrio:barrio, direccion:direccion, password:password},
            }).done(function(data){

            $("#edit-dep").modal('hide');
            show_ents();
            
            });

    });

function show_ents() {
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url() ?>Entrenador/ent_data',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i < data.length; i++){
                      
                        html += '<tr>'+
                        '<td>'+data[i].cedula+'</td>'+
                        '<td>'+data[i].tipo_documento+'</td>'+
                        '<td>'+data[i].nombre+'</td>'+
                        '<td>'+data[i].apellidos+'</td>'+
                        '<td>'+data[i].email+'</td>'+
                        '<td>'+data[i].telefono+'</td>'+
                        '<td>'+data[i].celular+'</td>'+ 
                        '<td>'+data[i].fecha_nacimiento+'</td>'+
                        '<td>'+data[i].barrio+'</td>'+
                        '<td>'+data[i].direccion+'</td>'+
                        '<td>'+data[i].deporte+'</td>'+
                        '<td>'+data[i].password+'</td>'+
                        
                        '<td>'+'<button data-toggle="modal" data-target="#edit-dep" class="btn btn-primary edit-dep" value="'+data[i].cedula+'"><i class="far fa-edit"></i></button><button data-toggle="modal" data-target="#del-dep" class="btn btn-danger del-dep" value="'+data[i].cedula+'"><i class="fas fa-user-minus"></i></button>'+
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