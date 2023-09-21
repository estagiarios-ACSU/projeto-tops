<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Fullcalendar -->
    <script type="text/javascript" src="fullcalendar-6.1.8  /dist/index.global.min.js"></script>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php 
    $currentData = date('Y-m-d');
    ?>

    <!-- Calendar Container -->
    <div id='calendar-container'>
        <div id='calendar'></div>
    </div>

<!-- paraa ir ou voltar uma pagina o histor.go <script>
    const refreshBtn = document.getElementById("btnRefresh");

    function handleClick() {
        history.go(-1);
    }

    refreshBtn.addEventListener("click", handleClick);

</script>  --> 
    
<script>
// document.getElementById("btnRefresh").addEventListener("click", function() {
//     fetch("refresh-data.php") // Replace with your server endpoint
//         .then(response => response.text())
//         .then(data => {
//             // Replace the content with the new data received from the server
//             document.getElementById("calendar").innerHTML = data;
//         })
//         .catch(error => {
//             console.error("Error:", error);
//         });
// });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
     var calendarEl = document.getElementById('calendar');

     var calendar = new FullCalendar.Calendar(calendarEl, {
         initialDate: '<?= $currentData ?>',
         height: '600px',
         selectable: true,
         editable: true, 
         dayMaxEvents: true, // allow "more" link when too many events 
         events: 'fetchevents.php', // Fetch all events
         select: function(arg) { // Create Event

              // Alert box to add event
              Swal.fire({
                  title: 'Add New Event',
                  showCancelButton: true,
                  confirmButtonText: 'Create',
                  html:
                  '<input id="eventtitle" class="swal2-input" placeholder="Event name" style="width: 84%;" >' +
                  '<textarea id="eventdescription" class="swal2-input" placeholder="Event description" style="width: 84%; height: 100px;"></textarea>',
                  focusConfirm: false,
                  preConfirm: () => {
                       return [
                            document.getElementById('eventtitle').value,
                            document.getElementById('eventdescription').value
                       ]
                  }
              }).then((result) => {

                  if (result.isConfirmed) {

                      var title = result.value[0].trim();
                      var description = result.value[1].trim();
                      var start_date = arg.startStr;
                      var end_date = arg.endStr;

                      if(title != '' && description != ''){

                           // AJAX - Add event
                           $.ajax({
                               url: 'ajaxfile.php',
                               type: 'post',
                               data: {request: 'addEvent',title: title,description: description,start_date: start_date,end_date: end_date},
                               dataType: 'json',
                               success: function(response){
                                    
                                    if(response.status == 1){

                                         // Add event
                                         calendar.addEvent({
                                              eventid: response.eventid,
                                              title: title,
                                              description: description,
                                              start: arg.start,
                                              end: arg.end,
                                              allDay: arg.allDay
                                         })
                                         

                                         // Alert message 
                                         Swal.fire(response.message,'','success'); 
                                    }else{
                                         // Alert message 
                                         Swal.fire(response.message,'','error'); 
                                    }

                               }
                           });
                      }

                  }
              })
              calendar.refetchEvents();
              calendar.unselect()
         },
         eventDrop: function (event, delta) { // Move event

              // Event details
              var eventid = event.event.extendedProps.eventid;
              var newStart_date = event.event.startStr;
              var newEnd_date = event.event.endStr;

              // AJAX request
              $.ajax({
                  url: 'ajaxfile.php',
                  type: 'post',
                  data: {request: 'moveEvent',eventid: eventid,start_date: newStart_date, end_date: newEnd_date},
                  dataType: 'json',
                  async: false,
                  success: function(response){

                       console.log(response);

                  }
              });

         },
         eventClick: function(arg) { // Edit/Delete event

              // Event details
              var eventid = arg.event._def.extendedProps.eventid;
              var description = arg.event._def.extendedProps.description;
              var title = arg.event._def.title;

              // Alert box to edit and delete event
              Swal.fire({
                   title: 'Edit Event',
                   showDenyButton: true,
                   showCancelButton: true,
                   confirmButtonText: 'Update',
                   denyButtonText: 'Delete',
                   html:
                   '<input id="eventtitle" class="swal2-input" placeholder="Event name" style="width: 84%;" value="'+ title +'" >' +
                   '<textarea id="eventdescription" class="swal2-input" placeholder="Event description" style="width: 84%; height: 100px;">' + description + '</textarea>',
                   focusConfirm: false,
                   preConfirm: () => {
                        return [
                            document.getElementById('eventtitle').value,
                            document.getElementById('eventdescription').value
                        ]
                   }
              }).then((result) => {

                   if (result.isConfirmed) { // Update

                        var newTitle = result.value[0].trim();
                        var newDescription = result.value[1].trim();

                        if(newTitle != ''){

                             // AJAX - Edit event
                             $.ajax({
                                 url: 'ajaxfile.php',
                                 type: 'post',
                                 data: {request: 'editEvent',eventid: eventid,title: newTitle, description: newDescription},
                                 dataType: 'json',
                                 async: false,
                                 success: function(response){

                                     if(response.status == 1){

                                         // Refetch all events
                                         calendar.refetchEvents();  

                                         // Alert message
                                         Swal.fire(response.message, '', 'success');
                                     }else{
                                         // Alert message
                                         Swal.fire(response.message, '', 'error');
                                     }

                                 }
                             }); 
                        }

                   } else if (result.isDenied) { // Delete

                        // AJAX - Delete Event
                        $.ajax({
                             url: 'ajaxfile.php',
                             type: 'post',
                             data: {request: 'deleteEvent',eventid: eventid},
                             dataType: 'json',
                             async: false,
                             success: function(response){

                                 if(response.status == 1){
                                       arg.event.remove();

                                       // Alert message
                                       Swal.fire(response.message, '', 'success');
                                 }else{
                                       // Alert message
                                       Swal.fire(response.message, '', 'error');
                                 }

                             }
                        }); 
                   }
              })

         }
     });
     calendar.render();

    //  // Função para recarregar o calendário
    //  calendar.getEventSources().forEach(function(source) {
    //     source.remove();
    // });

    // document.addEventListener('click', () => {
    //     fetch('fetchevents.php')
    //         .then(response => response.json())
    //         .then(data => {
    //             localStorage.setItem('eventos', JSON.stringify(data));
    //         })
    //         .catch(error => {
    //             console.error('Erro ao obter eventos:', error);
    //         });
       
    // }) 
    // var eventosArmazenados = JSON.parse(localStorage.getItem('eventos'));
    // console.log(eventosArmazenados);
    
    // // Adicione a nova fonte de eventos (por exemplo, após buscar eventos do servidor)
    // calendar.addEventSource(eventosArmazenados);
    

    calendar.render();
});
</script>
    
</body>
</html>