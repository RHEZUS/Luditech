@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')

@if(session('success'))
    
    <div class="alert alert-success">
        <strong>Success!&nbsp;&nbsp;</strong>{{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        <strong>Error! &nbsp;&nbsp;</strong>{{session('error')}}
    </div>

@endif
<form action="{{route('filter')}}" method="post">
    @csrf
    <div class="row d-flex my-3 mx-2">
        <div class="research col-lg-4 ">
            <label for="" class="form-label mx-3" style="visibility: hidden">Categories</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" name="title" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2" >Button</button>
            </div>
        </div>
        
        <div class="mb-3 col-lg-3 ">
        <label for="" class="form-label mx-3">Categories</label>
        <select class="form-select form-select-lg fs-6" style="height: 40px"  name="category" id="">
            <option selected value="">All</option>
            @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
        </select>
        </div>
        <div class="mb-3 col-lg-3">
            <label for="" class="form-label mx-3">Author</label>
            <select class="form-select form-select-lg fs-6"  style="height: 40px" name="author" id="">
                <option selected value="">All</option>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <label for="" class="form-label mx-3" style="visibility: hidden">submit</label>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>

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
