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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>Club" id="clubes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clubes</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>Deportista" id="deportistas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Deportistas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>Entrenador" id="entrenadores" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrenadores</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="res" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reservas</a>
        <div class="dropdown-menu" aria-labelledby="res">
          <a class="dropdown-item" href="<?php echo base_url(); ?>Reserva/crearReserva">Realizar reserva</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>Reserva">Ver Calendario</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>Escenario" id="esc" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Escenarios Deportivos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Login/logout" id="esc">Salir</a>
      </li>
      <li class="nav-item dropdown"><?php echo $usu; ?></li>
    </ul>
  </div>
</nav>