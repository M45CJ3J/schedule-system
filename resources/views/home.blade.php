@extends('layouts.app')

@section('content')
    <div id="calendar"></div>
</div>
   
<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/home',
        selectable:true,
        selectHelper: true,


       // insert appointment
        select:function(start, end, allDay)
        {
            var title = prompt('Subject of Appointment:');

            if(title)
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/home/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Wait for Admin Confirmation ");
                    }
                })
            }
        },
        editable:true,
        // insert appointment
        
            });

});
  
</script>
@endsection

