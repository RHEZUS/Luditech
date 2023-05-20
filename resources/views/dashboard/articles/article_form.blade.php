@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')

<div class="card bg-white mx-3 my-3 p-2 rounded">
    <div class="card-header">
        <h3 class="card-title">Add New Articles <span><a href="{{route('list_article')}}" class="btn btn-primary mx-3">All Articles</a></span></h3>
    </div>
    <div class="card-body">
        @if(isset($article->id))
        <form action="{{route('update_article')}}" class="row " method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" id="id" class="form-control" value="{{$article->id}}"> 
            </div> 
        @else
        <form action="{{route('store_article')}}" class="row " method="POST" enctype="multipart/form-data">
        @endif
            @csrf

            <div class="col-lg-8">
                
                <div class="mb-3">
                    <label for="" class="form-label">Post title</label>
                    <input type="text" name="title" value="{{(isset($article) ? $article->title : '') }}" id="title" class="form-control" placeholder="Enter the title of the article..."> 
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{(isset($article) ? $article->slug : '') }}" id="slug" class="form-control" placeholder="Slug autofill..."> 
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea id="content"  name="content" type="text" placeholder="Content">{{ old('content') ?? (isset($article) ? $article->content : '') }}</textarea>
                            
                </div>
            </div>
        
            <div class="col-lg-4">
                <div class="category-select mb-3">
                    <label for="category" class="form-label">Post Category</label>
                    <select class="form-select form-select-lg fs-6" name="category" id="category">
                        <option selected>Select one</option>
                        @foreach($category as $item)
                        <option value="{{$item['id']}}" {{(isset($article) && $item['id']= $article->category_id ? 'selected="selected"' : '') }} class="">{{$item['title']}}</option>
                        @endforeach
                        <option value="new">New</option>
                    </select>
                    <div class="my-3">
                        <input type="text" class="form-control" name="new_category" id="new-category" placeholder="">
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
                        <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" value="{{(isset($article) ? $article->thumbnail : asset('images/image-placeholder.png')) }}" name="thumbnail" id="imgInp" placeholder="" aria-describedby="fileHelpId">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="preview-image my-2">

                        <img id="blah" src="{{(isset($article) ? asset('storage/thumbnails/' . $article->thumbnail) : asset('images/image-placeholder.png')) }}" alt="your image" />

                    </div> 
                </div>

                <div class="mb-3">
                    <label for="tags-input" class="form-label">Post lable</label>
                    <div class="tag-contain">

                        <input type =" text" name ="tags" id="tags-input" placeholder="Type your tag here ..." value="{{(isset($article) ? $tags : '') }}">
                    </div>
                </div>

            </div>

            <button type="submit" style="width:100px; " class="btn btn-primary mx-auto">Save</button>
        </form>
    </div>
</div>
    

    <script>
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var slug = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $('#slug').val(slug);
            });

        });
    </script>
       
@stop