@extends('welcome')
@section('content')



{{-- no data massage --}}
@if ($datas->isEmpty())
    <h1>there is no data</h1>
{{-- table with data --}}
@else  
<div class="p-5 text-center">   
    {{-- massage --}}
@if (session()->has('massage'))
<div class="alert alert-success">
    {{session()->get("massage")}}
</div>    
@endif 
    <table class="table">
        <thead>
        <tr>        
            <th scope="col">Name</th>    
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>                        
                <td>{{$data->name}}</td>
                <td>
                    <a href="{{url('/view/'.$data->id)}}">
                        <button class="btn btn-success" >View</button>
                    </a>
                    <a href="{{url('/edit_page/'.$data->id)}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    <a href="{{url('/delete/'.$data->id)}}">                        
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>          
        @endforeach
        </tbody>
    </table>
</div>      
@endif

    
@endsection