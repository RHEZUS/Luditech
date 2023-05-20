@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')  
 
@section('content')

@if (isset($users->id))

    <form action="{{route('update_user')}}" class="mx-3 my-3 p-2 bg-white" method="post" enctype="multipart/form-data"> 
        
        <input type="hidden" name="id" value="{{$users->id}}">
    
@else

    <form action="{{route('create_user')}}" class="mx-3 my-3 p-2 bg-white" method="post" enctype="multipart/form-data">

@endif

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
        
                    <img id="blah" class="" src="{{isset($users->id) ? asset('/storage/profile_pictures/'.$users->profile_picture) : asset('images/image-placeholder.png')}}" alt="your image" />
        
                </div>
                <div class="mb-3 image text-center">
                    <label class="imgInp mx-auto px-1 py-2 my-2 text-light rounded" style="background-color: #695cfe;" for="imgInp">Choose file</label><br>
                    <input type="file" style="visibility: hidden;" name="picture" id="imgInp" >
                </div>

                @error('picture')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="col-sm-8">
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text"
                class="form-control" name="username" value="{{isset($users->id) ? $users->name : ''}}" id="username" aria-describedby="helpId" placeholder="">
            </div>

            @error('username')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email"
                  class="form-control" name="email" value="{{isset($users->id) ? $users->email : ''}}" id="email" aria-describedby="helpId" placeholder="">
            </div>

            @error('email')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password"
                  class="form-control" name="password" value="" id="password" aria-describedby="helpId" placeholder="">
            </div>

            @error('password')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="mb-5">
                <label for="role" class="form-label">Role</label>
                <select class="form-select form-select-lg fs-5" name="role" id="role">
                    <option  {{isset($users->id) ? '' : 'selected'}}>Select one</option>
                    <option value="1" {{isset($users->id) && $users->is_admin==1 ? 'selected' : ''}}>Admin</option>
                    <option value="0"{{isset($users->id) && $users->is_admin==0 ? 'selected' : ''}}>Author</option>
                </select>
            </div>
            @error('role')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mx-auto">Save..</button>

    
    
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