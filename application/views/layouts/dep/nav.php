<nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
        <a class="nav-link" href="<?php echo base_url();?>Reserva" id="reservas" role="button" aria-expanded="false">Reservas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Login/logout" id="esc">Salir</a>
      </li>
    </ul>
    <li class="nav-item">
        <a href="nav-link" href="#" style="color:white" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <?php echo $usu; ?></a></li>
  </div>
</nav>  