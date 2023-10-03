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
        }
     });
     calendar.render();
});
</script> 
</body>
</html>