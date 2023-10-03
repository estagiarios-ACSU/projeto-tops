<!DOCTYPE html>
<html lang="en">
<body>
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
         height: '800px',
         selectable: true,
         editable: true, 
         dayMaxEvents: true, // allow "more" link when too many events 
         events: 'fetchevents.php', // Fetch all
         customButtons: {
          myCustomButton: {
               text: 'Voltar',
               click: function() {
                    var a = '<?= $top ?>'
                    // window.open('../top'+a+'.php');
                    window.location.href = "../top" + a +".php"
               }
          }
        }, 
        headerToolbar: {
          // left: 'prev,next today myCustomButton',
          // center: 'title',
          right:'today prev,next myCustomButton'
        },
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
                  '<label id="start_evento" for="start_date">Inicio do evento:</label>' +
                  '<input type="date" id="start_date" class="swal2-input" value="" style="width: 80%;">' +
                  '<label id="end_evento" for="end_date">Fim do evento:</label>' +
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
    
                    if (cor_selecionada == null){
                        cor_selecionada = "#000000"
                    }
                
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
                                        

                                        // Alert message 
                                        Swal.fire(response.message,'','success');
                                        
                                        
                                        var url = location.href
                                        setTimeout(function() {
                                            window.location.href = url;
                                        }, 3000);
                                    }else{
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
              var eventid = arg.event._def.extendedProps.eventid
              var description = arg.event._def.extendedProps.description
              var title = arg.event._def.title
              var cor_selecionada = null

              // Alert box to edit and delete event
              Swal.fire({
                   title: 'Editar Evento',
                   showDenyButton: true, 
                   showCancelButton: true,
                   confirmButtonText: 'Atualizar',
                   denyButtonText: 'Deletar',
                   html:
                   '<input id="eventtitle" class="swal2-input" name="evento" placeholder="Nome do Evento" style="width: 80%;" >' +
                   '<textarea id="eventdescription" class="swal2-input" placeholder="Descrição do evento" style="width: 80%; height: 100px;"></textarea>'+
                   '<label id="start_evento" for="start_date">Inicio do evento:</label>' +
                   '<input type="date" id="start_date" class="swal2-input" style="width: 80%;">' +
                   '<label id="end_evento" for="end_date">Fim/ do evento:</label>' +
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
                   focusConfirm: false,
                   cancelButtonText:
                  'Cancelar',
                   didOpen: () => {

                    // Pegar a data final
                    let formdata = new FormData();
                    formdata.append('event_id',eventid);

                    let fetchdata = {
                         method:'POST',
                         body :formdata
                    };

                    fetch('end_date_input.php',fetchdata).then(responses => responses.text()).then(resposta => {
                        
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

                    // Defina a data de começo no input do Swal após o modal ser aberto
                    var selectedDate = arg.event.start.toISOString().substring(0, 10);
                    var start_date = document.getElementById('start_date')
                    start_date.value = selectedDate



                    // Pegar o valor do title e do description 
                    fetch('placeholder_value.php',fetchdata).then(responses => responses.text()).then(values => {
                        
                        // tira as aspas do retorno do dicionario
                        var array_value = JSON.parse(values);
                        // console.log(array_value)
                        
                        // Mudando os valores
                        document.getElementById('eventtitle').value = array_value.title
                        document.getElementById('eventdescription').value = array_value.description

                        // Colocar cor que foi adcionado

                        var select = document.getElementById('lista_cores')
                        select.style.color = array_value.color

                        if (cor_selecionada == null){
                            cor_selecionada = array_value.color
                            select.value = array_value.color
                        }
                   })
                   
                    // Mudar as cores quando for editar
                    var select = document.getElementById('lista_cores')

                    select.addEventListener('change', function(){
                        // console.log(select.value)
                        cor_selecionada = select.value
                        select.style.color = cor_selecionada
                    })
                    
    
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

                   if (result.isConfirmed) { // Update
                        var newTitle = result.value[0].trim();
                        var newStart_date = result.value[1].trim();
                        var newEnd_date = result.value[2].trim();
                        var newDescription = result.value[3].trim();
                        var new_color = result.value[4].trim();
                        
                        if(newTitle != '' && newDescription != ''){

                             // AJAX - Edit event
                             $.ajax({
                                 url: 'ajaxfile.php',
                                 type: 'post',
                                 data: {request: 'editEvent',eventid: eventid,title: newTitle, start_date: newStart_date, end_date: newEnd_date, description: newDescription, color: new_color},
                                 dataType: 'json',
                                 async: false,
                                 success: function(response){
                                     if(response.status == 1){
                                        // Refetch all events
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
                        }else {
                        Swal.fire("Campo sem valor!!!",'','error');
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