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
                <th scope="col">#</th>
                <th scope="col">Tipo documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Celular</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Barrio</th>
                <th scope="col">Dirección</th>
                <th scope="col">Estatura</th>
                <th scope="col">Peso</th>
                <th scope="col">Deporte</th>
                <th scope="col">Password</th>
                <th scope="col">Más</th>
              </tr>
            </thead>
            <tbody>
            
            <?php
            foreach($deportistas_data as $row)
            {

              echo '
              <tr>
                <td>'.$row->cedula.'</td>
                <td>'.$row->tipo_documento.'</td>
                <td>'.$row->nombre.'</td>
                <td>'.$row->apellidos.'</td>
                <td>'.$row->telefono.'</td>
                <td>'.$row->celular.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->fecha_nacimiento.'</td>
                <td>'.$row->barrio.'</td>
                <td>'.$row->direccion.'</td>
                <td>'.$row->estatura.'</td>
                <td>'.$row->peso.'</td>
                <td>'.$row->deporte.'</td>
                <td>'.$row->password.'</td>
                <td><button data-toggle="modal" data-target="#edit-dep" class="btn btn-primary edit-dep" value='.$row->cedula.'><i class="far fa-edit"></i></button></td>
                
              </tr>
              ';
            }
            ?>
            </tbody>
          </table>
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
                    <form action="<?php echo base_url(); ?>Deportista/nuevoDeportista" method="post">
                    
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
                <label for="">Teléfono</label>
                <input type="text" id="tel" name="tel" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Celular</label>
                <input type="text" id="cel" name="cel" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Correo Electrónico</label>
                <input type="text" id="email" name="email" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" id="pass" name="pass" value="" class="form-control">
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

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Estatura</label>
                    <input type="text" id="est" name="estatura" value="" class="form-control">   
                </div>
                <div class="form-group col-md-6">
                    <label for="">Peso</label>
                    <input type="text" id="peso" name="peso" value="" class="form-control"> 
                </div>
            </div>

            <input type="submit" name="submit" value="Crear" />
            </form>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
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
    });
});
</script>
</body>