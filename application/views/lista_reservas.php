<div class="container">
<div id='calendar'></div>
</div>

<div id="detalleModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Event Details</h4>
 </div>
 <div id="modalBody" class="modal-body">
 <h4 id="mdTitle" class="modal-title"></h4>
 <p id="mdclub"></p>
 <p id="mdesc"></p>
 <p id="mdfinicio"></p>
 <p id="mdfin"></p>
 </div>
 <input type="hidden" id="eventID"/>
 <div class="modal-footer">

 	<button class="btn btn-warning" id="confirmarTodos" data-dismiss="modal" aria-hidden="true">Confirmar Todos </button>
  <button class="btn btn-success" id="confirmar" data-dismiss="modal" aria-hidden="true">Confirmar</button>

 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
 <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
 </div>
 </div>
</div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

	$(document).ready(function() {

		$.post('<?php echo base_url(); ?>Reserva/getReserva',
			function(data) {
				alert(data);
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
						events: $.parseJSON(data),
						eventClick: function(event) {
							horaini = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
							horafin = $.fullCalendar.moment(event.end).format("dddd, MMMM Do YYYY, h:mm");
							
							$('#mdTitle').html(event.title);
							$('#mdclub').html(event.club);
							$('#mdesc').html(event.escenario);
							$('#mdfinicio').html(horaini);
							$('#mdfin').html(horafin);
							$('#detalleModal').modal('show');
						}
						/*
						 [
							{
								title: 'All Day Event',
								start: '2016-12-01'
							},
							{
								title: 'Long Event',
								start: '2016-12-07',
								end: '2016-12-10'
							},
							{
								id: 999,
								title: 'Repeating Event',
								start: '2016-12-09T16:00:00'
							},
							{
								id: 999,
								title: 'Repeating Event',
								start: '2016-12-16T16:00:00'
							},
							{
								title: 'Conference',
								start: '2016-12-11',
								end: '2016-12-13'
							},
							{
								title: 'Meeting',
								start: '2016-12-12T10:30:00',
								end: '2016-12-12T12:30:00'
							},
							{
								title: 'Lunch',
								start: '2016-12-12T12:00:00'
							},
							{
								title: 'Meeting',
								start: '2016-12-12T14:30:00'
							},
							{
								title: 'Happy Hour',
								start: '2016-12-12T17:30:00'
							},
							{
								title: 'Dinner',
								start: '2016-12-12T20:00:00'
							},
							{
								title: 'Birthday Party',
								start: '2016-12-13T07:00:00'
							},
							{
								title: 'Click for Google',
								url: 'http://google.com/',
								start: '2016-12-28'
							}
						]
						*/
					});
			});
		
		
		
	});

</script>

</body>
