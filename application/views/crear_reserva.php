
    <div class="container-fluid">
    <h2>Reserva</h2>
    <div class="row">
    <div class="main col-md-5">
        
        <div class="row">
            <div class="form-group col"> 
                <label for="">Seleccionar Club</label>
                <select name="club" class="form-control" id="club">
                    <option value="0">-- Seleccione --</option>
                <?php 
                    foreach ($listclub as $row) {
                       echo '<option value='.$row->id.'>'.$row->nombre.'</option>';
                    }
                ?>
                </select>
            </div>
            <div class="form-group col">
                <label for="escenario">Seleccionar escenario</label>
                <select name="escenario" class="form-control" id="escenario">
                    <option value="0">-- Seleccione --</option>
                    <?php 
                        foreach ($listesc as $row) {
                            echo '<option value='.$row->id.'>'.$row->nombre.'</option>';
                        }
                    ?>
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
                <label for="">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="horaini">hora Inicio:</label>
                <input type="text" id="horaini" name="horaini" class="form-control">
            </div>
            <div class="col">
                <label for="horafin">hora Fin:</label>
                <input type="text" id="horafin" name="horafin" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <input type="hidden" value="1" name="estado" id="estado" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary" id="click">Reservar</button>
    </div>
    <div class="side listh col-md-5">
        <div id="list">
            <h3>Horarios del Escenario deportivo</h3>
            <ul>
                <li class="days lun" >Lunes
                    <ul id="lun">
                    </ul>
                </li>
                <li class="days mar">Martes
                    <ul id="mar">
                    </ul>
                </li>
                <li class="days mie">Miercoles
                    <ul id="mie">
                    </ul>
                </li>
                <li class="days jue">Jueves
                    <ul id="jue">
                    </ul>
                </li>
                <li class="days vie">Viernes
                    <ul id="vie">
                    </ul>
                </li>
                <li class="days sab">Sabado
                    <ul id="sab">
                    </ul>
                </li>
                <li class="days dom">Domingo
                    <ul id="dom">
                    </ul>
                </li class="days">
            </ol>
        </div>
    </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script>    
    $(document).ready(function() {
        $('#horaini').datetimepicker({
            format: 'LT'
        });
        $('#horafin').datetimepicker({
            format: 'LT'
        });

$("#escenario").change(function() {
    var id = $(this).find(":selected").val();
    $.ajax({
//            type: 'POST',
        url: "<?php echo base_url() ?>Reserva/lista/"+id,
//            dataType: "json",
//            data: dataString,
//            cache: false,
        success: function (escData) {
            var html = '';
            var html2 = '';
            var html3 = '';
            var html5 = '';
            var html6 = '';
            var title = '';
            if(escData) {
                $(".side").css("display","block");
                $("div.side #list").css("display","block");
                var datos = JSON.parse(escData);
                $("div.side #list .lun").css("display","none");
                $("div.side #list .mar").css("display","none");
                $("div.side #list .mie").css("display","none");
                $("div.side #list .jue").css("display","none");
                $("div.side #list .vie").css("display","none");
                $("div.side #list .sab").css("display","none");
                for(i = 0; i < datos.length; i++) {
                    if(datos[i].dia == "lunes") {
                        
                        $("div.side #list .lun").css("display","block");
                            html += "<li>" + datos[i].jornada + ": Desde las " + datos[i].hora_inicio + " Hasta las: " + datos[i].hora_fin + "</li>";
                            $("#lun").html(html);
                            
                    }
                    if(datos[i].dia == "martes") {
                        
                        $("div.side #list .mar").css("display","block");
                            html2 += "<li>" + datos[i].jornada + ": Desde las " + datos[i].hora_inicio + " Hasta las: " + datos[i].hora_fin + "</li>";
                            $("#mar").html(html2);
                            
                    }
                    if(datos[i].dia == "miercoles") {
                        
                        $("div.side #list .mie").css("display","block");
                            html3 += "<li>" + datos[i].jornada + ": Desde las " + datos[i].hora_inicio + " Hasta las: " + datos[i].hora_fin + "</li>";
                            $("#mie").html(html3);
                            
                    }
                    if(datos[i].dia == "jueves") {
                        
                        $("div.side #list .jue").css("display","block");
                            html4 += "<li>" + datos[i].jornada + ": Desde las " + datos[i].hora_inicio + " Hasta las: " + datos[i].hora_fin + "</li>";
                            $("#jue").html(html4);
                    }
                    if(datos[i].dia == "viernes") {
                        
                        $("div.side #list .vie").css("display","block");
                            html5 += "<li>" + datos[i].jornada + ": Desde las " + datos[i].hora_inicio + " Hasta las: " + datos[i].hora_fin + "</li>";
                            $("#vie").html(html5);
                    }
                    if(datos[i].dia == "sabado") {
                        
                        $("div.side #list .sab").css("display","block");
                            html6 += "<li>" + datos[i].jornada + ": Desde las " + datos[i].hora_inicio + " Hasta las: " + datos[i].hora_fin + "</li>";
                            $("#sab").html(html6);
                    }
                }
            }
            else
            alert("Nanay");
        }
    });
});

$("#click").click(function() {
    var id = $("#id").val();
    var escenario = $("#escenario").val();
    var club = $("#club").val();
    var descripcion = $("#descripcion").val();
    var fecha = $("#fecha").val();
    var hini = $("#horaini").val();
    var hfin = $("#horafin").val();
    var fh_inicio = fecha+" "+hini;
    var fh_fin = fecha+" "+hfin;
    var estado = $('#estado').val();

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url() ?>Reserva/nuevo',
        data: {id:id, club:club, escenario:escenario, descripcion:descripcion, fh_inicio:fh_inicio, fh_fin:fh_fin, estado:estado},
    }).done(function(data) {
        if(data) {
            window.location.replace(data); 
        }
        else {
           alert("error");
       }
    });
    /*
    $.post("../php/scriptevento.php", {id:id, escenario:escenario, club:club, descripcion:descripcion, fh_inicio:fh_inicio, fh_fin:fh_fin, estado:estado}).done(function(data) {
        alert( "Datos cargados: " + data );
    });
    */
});
});
</script>
</body>
</html>