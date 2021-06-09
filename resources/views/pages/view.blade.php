@extends('welcome')
@section('content')
<div class="card text-center m-5">
    <div class="card-header">
      Blog
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$data->name}}</h5>
      <p class="card-text">{{$data->details}}</p>        
        <a href="{{url('/edit_page/'.$data->id)}}">
            <button class="btn btn-primary">Edit</button>
        </a>
        <a href="{{url('/delete/'.$data->id)}}">                        
            <button class="btn btn-danger">Delete</button>
        </a>
    </div>
    <div class="card-footer text-muted">
      created: {{$data->created_at}}
      @if ($data->updated_at == null)
      last update: no update    
      @else
      last update: {{$data->updated_at}}
      @endif
    </div>
  </div>
@endsection