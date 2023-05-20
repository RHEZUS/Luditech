
@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')
    <div class="card bg-white mx-3 my-3 p-2 rounded">
        <div class="card-header">
            <h3 class="card-title">Add New Product <span><a href="{{route('product_list')}}" class="btn btn-primary mx-3">All Products</a></span></h3>
        </div>
        <div class="card-body">

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


            @if(isset($product->id))
            <form action="{{route('update_product')}}" class="row " method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{$product->id}}"> 
                </div> 
            @else
            <form action="{{route('store_product')}}" class="row" method="POST" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="col-lg-8">
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Product name</label>
                        <input type="text" name="name" value="{{(isset($product) ? $product->name : '') }}" id="name" class="form-control" > 
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Quantity</label>
                        <input type="number" name="quantity" value="{{(isset($product) ? $product->quantity : '') }}" id="quantity" class="form-control"> 
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Price</label>
                        <input type="number" name="price" value="{{(isset($product) ? $product->price : '') }}" id="price" class="form-control"> 
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Description</label>
                        <textarea id="content"  name="description" type="text" placeholder="Description">{{ old('content') ?? (isset($product) ? $product->desc : '') }}</textarea>
                                
                    </div>


                    <!-- procuct images -->

                    <div class="card mb-3">
                        <div class="card-body mb-3" class="dropzone" id="dropzonewidget">
                            <div class="mb-3">
                              <label for="" class="form-label">Choose file</label>
                              <input type="file" class="form-control" name="images[]" multiple>

                                @if (isset($product->id))
                                  
                              <div class="container">
                                    <div class="row my-3">
                                            
                                        @foreach ($product->images as $item)
                                            <div class="col-lg-3 img-preview">
                                                <img src="{{asset('storage/productImages/'. $item->image_name)}}" alt="" style="width: 100%; height:100px">
                                                <a href="{{"/dashboard/products/image/delete/".$item['id']}}"><i class='bx bx-x'></i></a>
                                            </div>
                                        @endforeach
                                            
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                
                </div>
            
                <div class="col-lg-4">
                    <div class="category-select mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select form-select-lg fs-6" name="category" id="category">
                            <option selected>Select one</option>
                            @foreach($category as $item)
                            <option value="{{$item['id']}}" {{(isset($product) && $item['id']== $product->category_id ? 'selected="selected"' : '') }} class="">{{$item['name']}}</option>
                            @endforeach
                            <option value="new">New</option>
                        </select>
                        <div class="my-3" id="new-category">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="new_category"  placeholder="Category name">
                            </div>
                            <div class="mb-3">
                              <textarea class="form-control" name="new_category_desc" id="" rows="3" placeholder="Add a description"></textarea>
                            </div>
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
                            <input type="file" class="form-control" name="thumbnail" value="{{(isset($product) ? $product->thumbnail : asset('images/image-placeholder.png')) }}" id="imgInp" aria-describedby="fileHelpId">

                        </div>
                        <div class="preview-image my-2">

                            <img id="blah" src="{{(isset($product) ? asset('storage/productImages/' . $product->thumbnail) : asset('images/image-placeholder.png')) }}" alt="your image" />

                        </div> 
                    </div>

                </div>

                <button type="submit" style="width:100px; " class="btn btn-primary mx-auto">Save</button>
            </form>
        </div>
    </div>

    
@stop