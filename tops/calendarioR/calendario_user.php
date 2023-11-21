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
      editable: false, 
      dayMaxEvents: true, // allow "more" link when too many events 
      events: 'fetchevents.php', // Fetch all
      customButtons: {
      myCustomButton: {
            text: 'Voltar',
            click: function() {
                var a = '<?= $top ?>'
                // window.open('../top'+a+'.php');
                window.location.href = "http://localhost/topatual/tops/top"+a+".php"
            }
        }
      },
    headerToolbar: {
      // left: 'prev,next today myCustomButton',
      // center: 'title',
      right:'today prev,next myCustomButton'
    },
    eventClick: function (arg) {
      var eventid = arg.event._def.extendedProps.eventid
      // console.log(eventid);

      Swal.fire({
        title: 'Informações do evento',
        showCancelButton: true,
        showConfirmButton: false,
        html:   
        '<label id="start_evento" for="start_date">Nome do evento:</label>' +
        '<input id="eventtitle" class="swal2-input" name="evento" placeholder="Nome do Evento" style="width: 80%;" disabled>' +
        '<label id="start_evento" for="start_date"  style="margin-left:30px;">Descrição do evento:</label>' +
        '<textarea id="eventdescription" class="swal2-input" placeholder="Descrição do evento" style="width: 80%; height: 100px;" disabled></textarea>',
        focusConfirm: false,
        cancelButtonText:
        'Sair',
        didOpen: () => {
          let formdata = new FormData();
          formdata.append('event_id', eventid);

          let fetchdata = {
                method:'POST',
                body :formdata
          };

          fetch('placeholder_value.php',fetchdata).then(responses => responses.text()).then(values => {
            
            // tira as aspas do retorno do dicionario
            var array_value = JSON.parse(values);
            // console.log(array_value)
            
            // Mudando os valores
            document.getElementById('eventtitle').value = array_value.title
            document.getElementById('eventdescription').value = array_value.description
            // Colocar cor que foi adcionado
          })
        }
      });
    }
  });
  calendar.render();
});
</script> 
</body>
</html>