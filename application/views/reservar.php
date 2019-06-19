<h2>Reserva</h2>
    <div class="container-fluid">
    <div class="row">
    <div class="main col-md-5">
        
        <div class="form-group">
            <div class="col">
                <label for="">Id</label>
                <input type="text" name="id" id="id" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="">Seleccionar escenario</label>
                <select name="escenario" class="form-control" id="escenario">
                    <option value="0">-- Seleccione --</option>
                    <?php while($row = mysqli_fetch_assoc($sql)) { ?>
                        <option value="<?=$row['id'] ?>"><?=$row['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col"> 
                <label for="">Seleccionar Club</label>
                <select name="club" class="form-control" id="club">
                        <option value="0">-- Seleccione --</option>
                        <option value="1">Delfines</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="">Fecha hora inicio</label>
                <input type="datetime-local" id="fecha_hora_inicio" name="fecha_hora_inicio" class="form-control">
            </div>
            <div class="form-group col">
                <label for="">Fecha hora fin</label>
                <input type="datetime-local" id="fecha_hora_fin" name="fecha_hora_fin" class="form-control">
               
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary" id="click">Reservar</button>
    </div>
    <div class="side col-md-5">
        <div id="list">
            <ul>
                <li>Lunes
                    <ul id="lun">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
                <li>Martes
                    <ul id="mar">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
                <li>Miercoles
                    <ul id="mie">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
                <li>Jueves
                    <ul id="jue">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
                <li>Viernes
                    <ul id="vie">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
                <li>Sabado
                    <ul id="sab">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
                <li>Domingo
                    <ul id="dom">
                        <li></li>
                        <li></li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
    </div>
</div>
</div>