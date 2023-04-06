@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')

@if(session('success'))
    
    <div class="alert alert-success">
        <strong>Success!</strong>{{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        <strong>Success!</strong>{{session('error')}}
    </div>

@endif


<div class="text-success"></div>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col"># Id</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Author</th>
        <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>
                {{$item->title}}
                <p class="options"><a href={{"/dashboard/edit/".$item['id']}}>Edit</a> <a href={{"/dashboard/delete/".$item['id']}} class="text-danger">Delete</a> <a href="#">liste</a></p>
            </td>
            <td>
            
                {{$item->category->title}}
            </td>
            <td>{{$item->author->name}} </td>
            <td>
                {{$item['created_at']}}
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@stop
