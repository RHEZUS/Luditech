@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')  
 
@section('content')


<form action="{{route('create_user')}}" class="mx-3 my-3 p-2 bg-white" method="post">

    @csrf

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    <div class="row my-4">
        <div class="col-sm-3">
            <div class="mb-3 my-auto">
                
                <div class="preview-image preview-image-profile my-2 mx-auto ">
        
                    <img id="blah" class="" src="{{(isset($article) ? asset('storage/thumbnails/' . $article->thumbnail) : asset('images/image-placeholder.png')) }}" alt="your image" />
        
                </div>
                <div class="input-group mb-3">
                    <div class="image text-center">
                      <label class="imgInp mx-auto px-1 py-2 my-2 text-light rounded" style="background-color: #695cfe;" for="imgInp">Choose file</label><br>
                      <input type="file" class="custom-file-input" style="display: block;" value="{{(isset($article) ? $article->thumbnail : asset('images/image-placeholder.png')) }}" name="picture" id="imgInp" >
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-sm-8">
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text"
                class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
            </div>

            @error('username')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email"
                  class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
            </div>

            @error('email')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password"
                  class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
            </div>

            @error('password')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="mb-5">
                <label for="role" class="form-label">Role</label>
                <select class="form-select form-select-lg fs-5" name="role" id="role">
                    <option selected>Select one</option>
                    <option value="1">Admin</option>
                    <option value="0">Author</option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mx-auto">Submit</button>

    
    
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