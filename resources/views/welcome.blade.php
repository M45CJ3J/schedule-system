@extends('layouts.app')

@section('content')
    <select class="form-select" aria-label="Default select example" id="select">
        <option selected>Open this select menu</option>
        @foreach (App\Models\Job::all() as $job)
          <option id="{{$job->id}}" name value="{{$job->id}}"><li>{{$job->name}}</li></option>
        @endforeach
     </select>
  
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
                        alert("you should be login ");
                
            }
        },
        editable:true,
        // insert appointment
        
            });

});
  
</script>
@endsection

