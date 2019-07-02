<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="#">Gesport</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Club" id="clubes" role="button" aria-haspopup="true" aria-expanded="false">Clubes</a>

      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="usu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios <span class="sr-only"></a>
        <div class="dropdown-menu" aria-labelledby="usu">
          <a class="dropdown-item" href="<?php echo base_url();?>Entrenador">Gestionar Entrenadores</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>Deportista">Gestionar Deportista</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="res" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reservas</a>
        <div class="dropdown-menu" aria-labelledby="res">
          <a class="dropdown-item" href="<?php echo base_url(); ?>Reserva/crearReserva">Realizar reserva</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>Reserva/listSolicitudes">Ver solicitudes de reserva</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>Reserva">Ver Calendario</a>

          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Escenario" id="esc" role="button" aria-haspopup="true" aria-expanded="false">Escenarios Deportivos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Login/logout" id="esc">Salir</a>
      </li>
      </ul>
      <li class="nav-item">
        <a href="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <?php echo $usu; ?></a></li>
    
  </div>
</nav>