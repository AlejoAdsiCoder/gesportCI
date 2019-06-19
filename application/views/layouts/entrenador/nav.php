<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Gesport</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="clubes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clubes</a>
      
      <div class="dropdown-menu" aria-labelledby="club">
        <a class="dropdown-item" href="#">Administrar</a>
        <a class="dropdown-item" href="<?php echo base_url();?>Club/Crear">Registrar Clubes</a>
        <a class="dropdown-item" href="#">Añadir Deportistas</a>
      </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="reservas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reservas</a>
      
      <div class="dropdown-menu" aria-labelledby="reserva">
        <a class="dropdown-item" href="<?php echo base_url();?>Reserva">Lista de reservas</a>
        <a class="dropdown-item" href="<?php echo base_url();?>">Reservar Escenario deportivo</a>
        <a class="dropdown-item" href="#">Añadir Deportistas</a>
      </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>/lista_deportistas.php" id="deportistas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Deportistas</a>
      
      <div class="dropdown-menu" aria-labelledby="deportistas">
        <a class="dropdown-item" href="">Administrar</a>
        <a class="dropdown-item" href="<?php echo base_url();?>Deportista/crearDeportista">Nuevo</a>
      </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Login/logout" id="esc">Salir</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-md-0">
      <input class="form-control" type="text" placeholder="Search">
    </form>
  </div>
</nav> 