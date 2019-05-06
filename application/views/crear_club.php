<div class="container">
<h2><?php echo "Prueba"; ?></h2>
<form action="<?php echo base_url() ?>Club/addClub" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" value="" id="nombre" name="nombre">
    <label for="deporte">Deporte</label>
    <select name="deporte" id="deporte">
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <label for="">Fecha</label>
    <input type="date" name="fecha" id="fecha_registro">
    <label for="">Cupo</label>
    <input type="text" name="cupo" id="cupo">
    <label for="">Estado</label>
    <input type="hidden" name="estado" id="estado">
    <input type="submit" name="submit" value="Crear">
</form>
</div>