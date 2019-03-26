<div class="container">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user"></i>Lista de Deportistas
  <button type="button" class="btn btn-success btn-lg">Nuevo Deportista</button>
  </div>
  <div class="card-body">
    <div class="side col-md-8">
    <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">E-mail</th>
                <th scope="col">Deporte</th>
                <th scope="col">Barrio</th>
                <th scope="col">Dirección</th>
                <th scope="col">Estatura</th>
                <th scope="col">Peso</th>
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
              </tr>
              ';
            }
            ?>
            </tbody>
          </table>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>