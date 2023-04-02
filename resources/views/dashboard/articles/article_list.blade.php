@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')
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
                <p class="options"><a href={{"/dasboard/edit/".$item['id']}}>Edit</a> <a href={{"/dasboard/delete/".$item['id']}} class="text-danger">Delete</a> <a href="#">liste</a></p>
            </td>
            <td>
            @foreach($item->categories as $ArticleCategory)

                {{$ArticleCategory->category->name}}

            @endforeach
            </td>
            <td> </td>
            <td>
                {{$item['created_at']}}
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@stop
