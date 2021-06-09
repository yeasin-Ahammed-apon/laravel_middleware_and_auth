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
    <form action="/add" method="post" >
        @csrf    
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" name = "name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="input-group-text">Details</span>
            <input type="text" name ="details"  class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div>
            <button class="btn btn-primary btn-lg m-3 w-50" type="submit">
                Add
            </button>
        </div>                
    </form>
</div>
    
@endsection