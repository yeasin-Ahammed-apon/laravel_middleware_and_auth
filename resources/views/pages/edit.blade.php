@extends('welcome')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="text-center m-5">
    <form action="/update" method="post" >
        @csrf    
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" name ="name" value="{{$data->name}}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="input-group-text">Details</span>
            <input type="text" name ="details" value="{{$data->details}}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div>
            <button class="btn btn-primary btn-lg w-50 m-3" type="submit">
                Update
            </button>
        </div>                
    </form>
</div>
    
@endsection