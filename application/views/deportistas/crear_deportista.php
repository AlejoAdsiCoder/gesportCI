<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('deportistas/crear_deportista'); ?>

<div class="form-group">
                <label for="">Número identificación</label>
                <input type="text" class="form-control">
            </div>
            <div class="row">
            <div class="form-group col">
                <label for="">Nombre</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col">
                <label for="">Apellidos</label>
                <input type="text" class="form-control">
            </div>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Deporte</label>
                <select name="deporte" class="form-control" id="deporte">

                </select>
            </div>
            <div class="form-group">
                <label for="">Fecha nacimiento</label>
                <input type="date" class="form-control" id="fechanac">
            </div>
            <div class="form-group">
                <label for="">Barrio</label>
                <select name="barrio" class="form-control" id=""></select>
            </div>

            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control" id="">
            </div>

            <div class="row">
                <div class="form-group col">
                    <label for="">Estatura</label>
                    <input type="text" class="form-control">   
                </div>
                <div class="form-group col">
                    <label for="">Peso</label>
                    <input type="text" class="form-control"> 
                </div>
            </div>

    <input type="submit" name="submit" value="Crear" />

</form>