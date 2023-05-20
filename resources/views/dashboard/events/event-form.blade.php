@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')
    <div class="card bg-white mx-3 my-3 p-2 rounded">
        <div class="card-header">
            <h3 class="card-title">Add New Event <span><a href="{{route('event_list')}}" class="btn btn-primary mx-3">All Events</a></span></h3>
        </div>
        <div class="card-body">
            @if(isset($event->id))
            <form action="{{route('update_event')}}" class="row " method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{$event->id}}"> 
                </div> 
            @else
            <form action="{{route('store_event')}}" class="row" method="POST" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="col-lg-8">
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Event title</label>
                        <input type="text" name="title" value="{{(isset($event) ? $event->title : '') }}" id="title" class="form-control" > 
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Event date</label>
                        <input type="datetime-local" name="date" value="{{(isset($event) ? $event->date : '') }}" id="date" class="form-control"> 
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Event Location</label>
                        <input type="text" name="location" value="{{(isset($event) ? $event->location : '') }}" id="location" class="form-control"> 
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Event description</label>
                        <textarea id="content"  name="description" type="text" placeholder="Description">{{ old('content') ?? (isset($event) ? $event->description : '') }}</textarea>
                                
                    </div>
                </div>
            
                <div class="col-lg-4">
                    <div class="category-select mb-3">
                        <label for="category" class="form-label">Event Category</label>
                        <select class="form-select form-select-lg fs-6" name="category" id="category">
                            <option selected>Select one</option>
                            @foreach($category as $item)
                            <option value="{{$item['id']}}" {{(isset($event) && $item['id']== $event->category_id ? 'selected="selected"' : '') }} class="">{{$item['title']}}</option>
                            @endforeach
                            <option value="new">New</option>
                        </select>
                        <div class="my-3">
                            <input type="text" class="form-control" name="new_category"  id="new-category">
                        </div>
                    </div>

                    @if ($errors)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="mb-3">
                        
                        <label for="feat-image" class="form-label">Featured Image</label> <br>
                        
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="thumbnail" value="{{(isset($event) ? $event->thumbnail : asset('images/image-placeholder.png')) }}" id="imgInp" aria-describedby="fileHelpId">

                        </div>
                        <div class="preview-image my-2">

                            <img id="blah" src="{{(isset($event) ? asset('storage/thumbnails/' . $event->thumbnail) : asset('images/image-placeholder.png')) }}" alt="your image" />

                        </div> 
                    </div>

                </div>

                <button type="submit" style="width:100px; " class="btn btn-primary mx-auto">Save</button>
            </form>
        </div>
    </div>
    

       
@stop