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
                <td><a href='.base_url().'Deportista/editar_deportista/'.$row->cedula.' class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="far fa-edit"></i></a></td>
                
              </tr>
              ';
            }
            ?>
            </tbody>
          </table>
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <?php
                    foreach($deportistas_data as $row)
                    { ?>
            <div class="form-group">
                <label for="">Tipo documento</label>
                <select class="form-control"  name="tipodoc">
                    <option value="cc">Cédula de ciudadania</option>
                    <option value="ti">Tarjeta de identidad</option>
                    <option value="ce">Cédula de extranjeria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Número identificación</label>
                <input type="text" value="<?php echo $row->cedula; ?>" class="form-control" name="cedula">
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="">Nombre</label>
                    <input type="text" name="nombres" value="<?php echo $row->nombre; ?>" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellidos" value="<?php echo $row->apellidos; ?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="">Teléfono</label>
                <input type="text" name="tel" value="<?php echo $row->telefono; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Celular</label>
                <input type="text" name="cel" value="<?php echo $row->celular; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Correo Electrónico</label>
                <input type="text" name="email" value="<?php echo $row->email; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" name="pass" value="<?php echo $row->password; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Deporte</label>
                <select name="deporte" name="deporte" class="form-control">
                    <option value="1">Baloncesto</option>
                    <option value="2">Futbol</option>
                    <option value="3">Natación</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Fecha nacimiento</label>
                <input type="date" class="form-control" value="<?php echo $row->fecha_nacimiento; ?>" name="fechanac">
            </div>
            <div class="form-group">
                <label for="">Barrio</label>
                <input type="text" class="form-control" value="<?php echo $row->barrio; ?>" name="barrio">
            </div>

            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control" value="<?php echo $row->direccion; ?>" name="direccion">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Estatura</label>
                    <input type="text" name="estatura" value="<?php echo $row->estatura; ?>" class="form-control">   
                </div>
                <div class="form-group col-md-6">
                    <label for="">Peso</label>
                    <input type="text" name="peso" value="<?php echo $row->peso; ?>" class="form-control"> 
                </div>
            </div>

            <input type="submit" name="submit" value="Crear" />
            </form>
                    <?php } ?>
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
</body>