@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')
    @if(isset($article->id))
    <form action="{{route('update_article')}}" class="row bg-white mx-3 my-3 p-2 rounded" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="hidden" name="title" id="title" class="form-control" value="{{$article->id}}"> 
        </div> 
    @else
    <form action="{{route('store_article')}}" class="row bg-white mx-3 my-3 p-2 rounded" method="POST" enctype="multipart/form-data">
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
                    <option value="{{$item['id']}}" class="">{{$item['title']}}</option>
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
                <input accept="image/*"  type="file" value="{{(isset($article) ? asset('app/storage/thumbnails/'.$article->thumbnail) : asset('images/image-placeholder.png')) }}" class="form-control" name="thumbnail" id="imgInp" placeholder="" aria-describedby="fileHelpId">
                <div class="preview-image my-2">

                    <img id="blah" src="{{(isset($article) ? asset('app/storage/thumbnails/'.$article->thumbnail) : asset('images/image-placeholder.png')) }}" alt="your image" />

                </div> 
            </div>

            <div class="mb-3">
                <label for="tags-input" class="form-label">Post lable</label>
                <div class="tag-contain">

                    <input type =" text" name ="tags" id="tags-input" placeholder="Type your tag here ..." value="{{(isset($article) ? foreach($article->tags as $arTags)$arTags->tag->name.',' endforeach : '') }}">
                </div>
            </div>

        </div>

        <button type="submit" style="width:100px; " class="btn btn-primary mx-auto">Save</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var slug = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $('#slug').val(slug);
            });

        });
    </script>
       
@stop