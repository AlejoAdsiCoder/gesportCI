<div class="jumbotron">
  <h1 class="display-4">Bienvenido! <?php echo $usu; ?></h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p>Informate de las reservas pendientes y realizadas ultimamente!</p>
  <section id="show_data"></section>
  <a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>Reserva" role="button">Ver calendario</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    /* Datos Editar */

    show_events();
  // Lista Reservas
  function show_events() {
        $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url() ?>Reserva/res_data',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;


                    for(i=0; i < data.length; i++){
                        var state = '';
                        switch(data[i].estado) {
                            case '1': 
                                state = 'Pendiente Aprobración';
                                html += '<div class="alert alert-warning" role="alert">Una reserva ha sido solicitada para el escenario '+data[i].escenario+' Para el club '+data[i].club+'</div>';
                                break;
                            case '2':
                                state = 'Aprobado';
                                html += '<div class="alert alert-primary" role="alert">Una reserva ha sido aprobada para el escenario '+data[i].escenario+' Para el club '+data[i].club+'</div>';
                                break;
                            case '3':
                                state = 'Realizado';
                                html += '<div class="alert alert-success" role="alert">Una actividad se realizo en el escenario '+data[i].escenario+' Para el club '+data[i].club+'</div>';
                                break;
                            default:
                                state = '0';
                                break;
                        }

                    }
                    $('#show_data').html(html);


                }
 
            });
    }
  });
</script>