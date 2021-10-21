@extends('layouts.app')

@section('content')
    <div class="row chat-row">
      <div class="chat-content">
          <ul>
            
          </ul>
      </div>

      <div class="chat-section">
          <div class="chat-box">
              <div class="chat-input bg-primary" id="chatInput" contenteditable="">

              </div>
          </div>
      </div>
  </div>
    


<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Appointments Request
        </h1>
    </div>
</div>



<table class="table">
    <thead>
      <tr>
        <th scope="col">to take action</th>
        <th scope="col">start time of appointment</th>
        <th scope="col">end time of appointment</th>
        <th scope="col">Subject</th>
        <th scope="col">Requester</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $schedules as $schedule )
      <tr>
        <th scope="row"><a  href="/admin/{{$schedule->id}}/edit">to take action </a></th>
        <td>{{$schedule->start}}</td>
        <td>{{$schedule->end}}</td>
        <td>{{$schedule->title}}</td>
        <td>{{$schedule->user->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection