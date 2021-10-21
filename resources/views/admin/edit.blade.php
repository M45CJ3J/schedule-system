@extends('layouts.app')

@section('content')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">requester name</label>
      <input type="text" class="form-control" disabled id="exampleInputEmail1" value="{{$schedules->user->name}}" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">subject of appointment</label>

        <div class="form-floating">
            <textarea class="form-control" disabled placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                {{$schedules->title}}
            </textarea>
        </div>
     </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">start at </label>
        <input type="datetime" disabled class="form-control" id="exampleInputEmail1" value="{{$schedules->start}}" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">end at </label>
        <input type="datetime" disabled class="form-control" id="exampleInputEmail1" value="{{$schedules->end}}" aria-describedby="emailHelp">
      </div>

     
    <form action="/admin/{{ $schedules->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <select class="form-select" name="status" aria-label="Default select example">
            <option selected>take action</option>
            <option value="approved">approved</option>
            <option value="not approved">not approved</option>
          
          </select>
        <button type="submit" class="btn btn-primary">take action</button>
    </form>


@endsection