
<div class="container">
<div class="row">
		<h3>
			Calendario Escenarios</h3>
</div><br>	

<div class="card">
  <div class="card-header">
    Filtros
  </div>
  <div class="card-body">
	  <div class="row checkbox">
	  <?php if(isset($_SESSION['e_nombre'])) { ?>
			<div class="form-check form-check-inline Checkclub">
			<input type="checkbox" id="Checkclub" class="form-check-input"><label class="form-check-label" for="Checkclub"> Calendario de su club</label>
			</div>

			<div class="form-check form-check-inline Checkclubes">
			<input type="checkbox" id="Checkclubes" class="form-check-input"><label class="form-check-label" for="Checkclubes"> Calendario de los clubes</label>
			</div>
		<?php } ?>
			<div class="form-group row col-md-8">
			
			<div class="row">
			<div class="col">
			<label for="fecha">Buscar por fecha</label>
			<input type="date" class="form-control" id="fecha">
				<button id="bdate">Buscar</button>
			</div>
			<div class="col">
				<label for="fecha">Buscar por Escenario</label>
				<select name="besc" class="form-control" id="besc">
					<option value="">
					<?php 
                        foreach ($listesc as $row) {
                            echo '<option value='.$row->id.'>'.$row->nombre.'</option>';
                        }
                    ?>
					</option>
				</select>
			</div>	
			<div class="col">
			<label for="fecha">Buscar por Club</label>
				<select name="bclub" class="form-control" id="bclub">
					<option value="">
					<?php 
                        foreach ($listclub as $row) {
                            echo '<option value='.$row->id.'>'.$row->nombre.'</option>';
                        }
                    ?>
					</option>
				</select>
			</div>
			</div>	
			</div>
	</div>
  </div>
</div>
<div class="row mt-3">
<div class="col-md-9" id='calendar'></div>
<div class="card col-md-3" style="width: 18rem;">
  <div class="card-header">
    Convenciones
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
	<span class="badge badge-pill badge-danger">Pendiente de Aprobación</span>
	</li>
    <li class="list-group-item">
	<span class="badge badge-pill badge-primary">Aprobado</span>
	</li>
    <li class="list-group-item">
	<span class="badge badge-pill badge-success">Confirmado</span>
	</li>
  </ul>
</div>
</div>
</div>

<div id="detalleModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Event Details</h4>
 </div>
 <div id="modalBody" class="modal-body">
 <strong>Descripción de la Reserva:</strong><p id="mdTitle"></p>
 <strong>Club:</strong><p id="mdclub"></p>
 <strong>Escenario deportivo:</strong><p id="mdesc"></p>
 <strong>Foto escenario deportivo:</strong><br><img style="width:150px" src="" id="mimg"><br><br>
 <strong>Dirección Escenario:</strong><p id="dir"></p>
 <strong>Estado de la reserva:</strong><p id="mstate"></p>
 <strong>Fecha hora inicio:</strong><p id="mdfinicio"></p>
 <strong>Hora fin:</strong><p id="mdfin"></p>
 </div>
 <input type="hidden" id="eventID"/>
 <div class="modal-footer">

 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
 </div>
 </div>
</div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

	$(document).ready(function() {

		checkClub();

		function checkClub() {
		$.post('<?php echo base_url(); ?>Reserva/getReserva',
			function(data) {
			$('#calendar').fullCalendar({
						header: {
							left: 'prev,next today',
							center: 'title',
							right: 'month,basicWeek,basicDay'
						},
						defaultDate: new Date(),
						navLinks: true, // can click day/week names to navigate views
						editable: true,
						eventLimit: true, // allow "more" link when too many events
						eventTextColor:'#fff',
						eventRender: function(event, element) {
							switch(event.state) {
								case '1':
									element.css('background-color', '#B0582C');
									break;
								case '2':
									element.css('background-color', '#4757F6');
									break;
								case '3':
									element.css('background-color', '#64B02C');
									break;
								default:
									element.css('background-color', 'black');
									break;
							}
						},
						events: $.parseJSON(data),
						
						eventClick: function(event) {
							/*
							horaini = $.fullCalendar.formatDate(event.start, {
								month: 'long',
    							year: 'numeric',
								day: 'numeric'
							});
							horafin = $.fullCalendar.formatDate(event.end, {
								month: 'long',
    							year: 'numeric',
								day: 'numeric'
							});
							*/
							$.fullCalendar.moment().locale('es');
							horaini = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
							horafin = $.fullCalendar.moment(event.end).format("h:mm");
							
							switch(event.state) {
								case '1': 
									state = 'Pendiente Aprobración';
									break;
								case '2':
									state = 'Aprobado';
									break;
								case '3':
									state = 'Realizado';
									break;
								default:
									state = '0';
									break;
							}
							var img = event.imagen;

							$('#mdTitle').html(event.title);
							$('#mdclub').html(event.club);
							$('#mdesc').html(event.escenario);
							$('#mimg').attr("src", img);
							$('#dir').html(event.dir)
							$('#mstate').html(state);
							$('#mdfinicio').html(horaini);
							$('#mdfin').html(horafin);
							$('#detalleModal').modal('show');
						}
						/*
						 [
							{
								title: 'All Day Event',
								start: '2016-12-01'
							}
						]
						*/
					});
			});
		}
			$('#Checkclubes').click(function() {
					$('#Checkclub').prop('checked', false); // quita la seleccion
				if($(this).is(":checked")) {
				$.post('<?php echo base_url(); ?>Reserva/getCheckclubes',
				function(data) {
					var obj = JSON.parse(data);
					alert(obj[3].state);
					$('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					$('#calendar').fullCalendar('addEventSource', obj); //agrega los nuevos eventos al calendario
				});
				}
				else {
					$.post('<?php echo base_url(); ?>Reserva/getReserva',
				function(data) {
					var obj = JSON.parse(data);
					$('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					$('#calendar').fullCalendar('addEventSource', obj); //agrega los nuevos eventos al calendario
				});
				}
			});

			$('#Checkclub').click(function() {
					$('#Checkclubes').prop('checked', false); // quita la seleccion
				if($(this).is(":checked")) {
				$.post('<?php echo base_url(); ?>Reserva/getReserva',
				function(data) {
					var obj = JSON.parse(data);
					$('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					$('#calendar').fullCalendar('addEventSource', obj); //agrega los nuevos eventos al calendario
				});
				}
			});
		
			$('#bdate').click(function() {
			$('#show_data').html('');
			var text = $('#fecha').val();
			$.ajax({
				type  : 'POST',
				url   : '<?php echo base_url() ?>Reserva/getResDate',
				data : {text:text},
				success : function(data){
					var obj = JSON.parse(data);
					$.each(obj, function(i, item) {
					//alert(obt.fecha_hora_inicio)
					$('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					$('#calendar').fullCalendar('addEventSource', obj); //agrega los nuevos eventos al calendario

					});
				}

			});
		});

		$('#besc').change(function() {
			var id = $(this).find(":selected").val();
			$.post('<?php echo base_url(); ?>Reserva/getEscReserva/'+id,
			function(esc) {
				var obj = JSON.parse(esc);
				$('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
				$('#calendar').fullCalendar('addEventSource', obj); //agrega los nuevos eventos al calendario
			});

		});

		$('#bclub').change(function() {
			var id = $(this).find(":selected").val();
			$.post('<?php echo base_url(); ?>Reserva/getClubReserva/'+id,
			function(club) {
				var obj = JSON.parse(club);
				$('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
				$('#calendar').fullCalendar('addEventSource', obj); //agrega los nuevos eventos al calendario
			});

		});
		
		
	});

</script>

</body>
