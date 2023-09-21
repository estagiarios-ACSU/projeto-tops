<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- CALENDARIO -->

    <!-- Fullcalendar -->
    <script type="text/javascript" src="calendario_js/index.global.min.js"></script>
    <script  type="text/javascript" src="calendario_js/pt-br.global.js"></script>
    <script  type="text/javascript" src="calendario_js/pt-br.global.min.js"></script>
    
    <!-- JQUUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="calendario_css/personalizado.css">
    <link rel="stylesheet" href="calendario_css/width.css">
    
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
    document.addEventListener('DOMContentLoaded', function() {
     var calendarEl = document.getElementById('calendar');

     var calendar = new FullCalendar.Calendar(calendarEl, {
         initialDate: '<?= $currentData ?>',
         locale: 'pt-br',
         height: '700px',
         selectable: true,
         editable: true, 
         dayMaxEvents: true, // allow "more" link when too many events 
         events: 'fetchevents.php', // Fetch all 
        //  eventColor: "#378006",
         select: function(arg) { // Create Event
              // Alert box to add event
              var cor_selecionada = null

              Swal.fire({
                  title: 'Adcionar novo evento',
                  showCancelButton: true,
                  confirmButtonText: 'Adcionar',
                  html:
                  '<input id="eventtitle" class="swal2-input" placeholder="Nome do Evento" style="width: 80%;" >' +
                  '<textarea id="eventdescription" class="swal2-input" placeholder="Descrição do evento" style="width: 80%; height: 100px;"></textarea>'+
                  '<input type="date" id="start_date" class="swal2-input" value="" style="width: 80%;">' +
                  '<input type="date" id="end_date" class="swal2-input" value="" style="width: 80%; margin-bottom: 1rem; onclick="date()">' +          
                  '<select id="lista_cores" name="Cores">' +
                  '<option selected data-default selected>- Selecione cor do evento -</option>' +
                  '<option id="value1" value="#000000">Cor Preto</option>' +
                  '<option id="value2" value="#0500ff">Cor Azul</option>' +
                  '<option id="value3" value="#ff0000">Cor Vermelho</option>' +
                  '<option id="value4" value="#964b00">Cor Marrom</option>' +
                  '<option id="value5" value="#ffff00">Cor Amarelo</option>' +
                  '<option id="value6" value="#993399">Cor Roxo</option>' +
                  '<option id="value7" value="#ffa500">Cor Laranja</option>' +
                  '<option id="value8" value="#059d15">Cor Verde</option>' + '</select>',
                  cancelButtonText:
                  'Cancelar',
                  focusConfirm: false,
                  didOpen: () => {
                    var selectedDate = arg.start.toISOString().substring(0, 10)
                    // alert(selectedDate)

                    // Defina a data no input do Swal após o modal ser aberto
                    var start_date = document.getElementById('start_date')
                    var end_date = document.getElementById('end_date')
                    start_date.value = selectedDate
                    end_date.value = selectedDate
                    
                    // Mudar a cor
                    var select = document.getElementById('lista_cores')

                    select.addEventListener('change', function(){
                        // console.log(select.value)
                        cor_selecionada = select.value
                        select.style.color = cor_selecionada
                    })

                    // if (cor_selecionada == null){
                    //     cor_selecionada = "000000"
                    // }

                  },
                  preConfirm: () => {
                       return [
                            document.getElementById('eventtitle').value,
                            document.getElementById('start_date').value,
                            document.getElementById('end_date').value,
                            document.getElementById('eventdescription').value,
                            cor_selecionada
                       ]
                  }
              }).then((result) => {
                //   alert(cor_selecionada)
                  if (result.isConfirmed) {

                      var title = result.value[0].trim();
                      var start_date = result.value[1].trim();
                      var end_date = result.value[2].trim();
                      var description = result.value[3].trim();
                      var new_color = result.value[4].trim();
                      alert(end_date)
                    
                    //   console.log(title, start_date, end_date, description, new_color);
                      if(title != '' && description != ''){
                        // alx
                           // AJAX - Add event
                           $.ajax({
                               url: 'ajaxfile.php',
                               type: 'post',
                               data: {request: 'addEvent',title: title,description: description,start_date: start_date,end_date: end_date, color: new_color},
                               dataType: 'json',
                               success: function(response){
                                    if(response.status == 1){
                                         // Add event
                                         calendar.addEvent({
                                              eventid: response.eventid,
                                              title: title,
                                              description: description,
                                              color: new_color,
                                              start: start_date,
                                              end: end_date,
                                              allDay: arg.allDay
                                         })
                                        // alert(new_color)
                                         // Alert message 
                                         Swal.fire(response.message,'','success'); 
                                    }else{
                                        // alert("não criado")
                                        console.log(response.mensage);
                                         // Alert message 
                                         Swal.fire(response.message,'','error'); 
                                    }

                               }
                           });
                      }else {
                        Swal.fire("Preencha todos os campos",'','error');
                      }

                  }
              })

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
                   title: 'Editar Evento',
                   showDenyButton: true, 
                   showCancelButton: true,
                   confirmButtonText: 'Atualizar',
                   denyButtonText: 'Deletar',
                   html:
                   '<input id="eventtitle" class="swal2-input" placeholder="Event name" style="width: 80%;" value="'+ title +'" >' +
                   '<input type="date" id="start_date" class="swal2-input" value="<?= $currentData ?>" style="width: 80%;">' +
                   '<input type="date" id="end_date" class="swal2-input" value="<?= $currentData ?>" style="width: 80%; margin-bottom: 1rem;">' +
                   '<textarea id="eventdescription" class="swal2-input" placeholder="Event description" style="width: 84%; height: 100px;">' + description + '</textarea>',
                   focusConfirm: false,
                   cancelButtonText:
                  'Cancelar',
                   didOpen: () => {

                    let formdata = new FormData();
                    formdata.append('event_id',eventid);

                    let fetchdata = {
                         method:'POST',
                         body :formdata
                    };

                    fetch('end_date_input.php',fetchdata).then(responses => responses.text()).then(resposta => {
                         var start_date = resposta
                        
                         function convert(str) {
                              var date = new Date(str),
                              mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                              day = ("0" + date.getDate()).slice(-2);
                              return [date.getFullYear(), mnth, day].join("-");
                         }
                         var format_date = Date.parse(resposta);
                         
                         var end_date = document.getElementById('end_date')
                         end_date.value = convert(format_date)

                         if (end_date.value == 0000-00-00){
                              var selectedDate = arg.event.start.toISOString().substring(0, 10);
                              var end_date = document.getElementById('end_date')
                              end_date.value = selectedDate
                         }
                    })

                    var selectedDate = arg.event.start.toISOString().substring(0, 10);

                    // Defina a data no input do Swal após o modal ser aberto
                    var start_date = document.getElementById('start_date')
                    start_date.value = selectedDate

                    // end_date.value = null;
                   },
                   preConfirm: () => {
                        return [
                            document.getElementById('eventtitle').value,
                            document.getElementById('start_date').value,
                            document.getElementById('end_date').value,
                            document.getElementById('eventdescription').value
                        ]
                   }
              }).then((result) => {

                   if (result.isConfirmed) { // Update

                        var newTitle = result.value[0].trim();
                        var newStart_date = result.value[1].trim();
                        var newEnd_date = result.value[2].trim();
                        var newDescription = result.value[3].trim();
                        var a = 0;
                        if(newTitle != ''){

                             // AJAX - Edit event
                             $.ajax({
                                 url: 'ajaxfile.php',
                                 type: 'post',
                                 data: {request: 'editEvent',eventid: eventid,title: newTitle, start_date: newStart_date, end_date: newEnd_date, description: newDescription},
                                 dataType: 'json',
                                 async: false,
                                 success: function(response){
                                     if(response.status == 1){
                                        // alert(response.status)
                                         // Refetch all events
                                        // calendar.refetchEvents();

                                        arg.event.remove();
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
});
</script>
    
</body>
</html>