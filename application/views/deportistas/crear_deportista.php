<div class="container">
<h2><?php echo "Prueba"; ?></h2>

<form action="<?php echo base_url() ?>Deportista/nuevoDeportista" method="post">
            <div class="form-group">
                <label for="">Tipo documento</label>
                <select class="form-control" name="tipodoc">
                    <option value="cc">Cédula de ciudadania</option>
                    <option value="ti">Tarjeta de identidad</option>
                    <option value="ce">Cédula de extranjeria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Número identificación</label>
                <input type="text" class="form-control" name="cedula">
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="">Nombre</label>
                    <input type="text" name="nombres" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="">Teléfono</label>
                <input type="text" name="tel" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Celular</label>
                <input type="text" name="cel" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Correo Electrónico</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" name="pass" class="form-control">
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
                <input type="date" class="form-control" name="fechanac">
            </div>
            <div class="form-group">
                <label for="">Barrio</label>
                <input type="text" class="form-control" name="barrio">
            </div>

            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control" name="direccion">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Estatura</label>
                    <input type="text" name="estatura" class="form-control">   
                </div>
                <div class="form-group col-md-6">
                    <label for="">Peso</label>
                    <input type="text" name="peso" class="form-control"> 
                </div>
            </div>

    <input type="submit" name="submit" value="Crear" />
    </form>
</div>