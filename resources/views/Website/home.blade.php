<!doctype html>
<html lang="en">

<head>
    <title>Luditech</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
        <x-header></x-header>
    </header>
    <main>
        <div class="homepage-section-1 m-0 p-0" style="border: 1px solid black;">

            <div class="container-fluid m-0 p-0"  style="margin-top: 300px;">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel" >
                    <ol class="carousel-indicators" style="z-index: 10;">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="w-100 d-block" alt="First slide">
                            <div class="carousel-caption d-none d-md-block" style="top:170px; z-index: 10;">
                                <h1 >Title</h1>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1643321611132-15f7b8a63347?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="w-100 d-block" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block"  style="top:170px; z-index: 10;">
                                <h1>Title</h1>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1473649085228-583485e6e4d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80" class="w-100 d-block" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block"  style="top:170px; z-index: 10;">
                                <h1>Title</h1>
                                <p>Description</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button style="z-index: 10;">
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button style="z-index: 10;">
                </div>
            </div>

        </div>

        <div class="homepage-section-2 p-4 lastest-causes">
            <div class="container">
                <div class="section-title mx-auto">
                    <h1 class="text-center"> Our causes </h1>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.  quidem suscipit aperiam ad excepturi beatae possimus! </p>
                    
                </div>
                
                <div class="row">

                    @foreach ($causes as $cause)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/thumbnails/'.$cause->thumbnail)}}" alt="Title" style="width: 100%; height: 200px; border-bottom: 1px solid darkgrey;">
                            <div class="card-body px-2">
                                
                                <div class="donation-progress py-2">
                                    <div class="infos m-0 p-0">
                                        <h1 class="text-center"> {{$cause->title}} </h1>
                                        <p class="text-center">{{$cause->description}}</p>
                        
                                    </div>
                                    
                                    <h5 class="card-title py-0">{{($cause->actual_donation * 100) /($cause->exp_donation)}} %</h5>
                                    <p class="progressbar"><span style="width: {{($cause->actual_donation * 100) /($cause->exp_donation).'%'}};"></span></p>
                                </div>
                                
                                <button class="btn btn-primary">Donate Now</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            
        </div>


        <div class="homepage-section-3 p-4 our-values">
            <div class="container py-4">
                <div class="section-title mx-auto mb-4" style="position: relative; z-index: 1;">
                    <h1 class="text-center text-white"> Our Values </h1>
                    <p class="text-center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.  quidem suscipit aperiam ad excepturi beatae possimus! </p>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-2 value">
                            <div class="card-body">
                                <i class='bx bx-heart fs-2 my-2 mx-auto'></i>
                                <h3>Love</h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, consequatur totam laboriosam?</p>
                            
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <div class="homepage-section-4 p-4 lastest-post">
            <div class="container">
                <div class="section-title mx-auto">
                    <h1 class="text-center"> Our causes </h1>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.  quidem suscipit aperiam ad excepturi beatae possimus! </p>
                    
                </div>
                
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/thumbnails/'.$post->thumbnail)}}" alt="Title" style="width: 100%; height: 220px; border-bottom:1px solid black;">
                            <div class="card-body">
                                <h4 class="card-title py-2">{{$post->title}}</h4>
                                <p class="card-text">{{$post->desc}}</p>
                                <p style="font-size: 13px">{{$post->updated_at->format('m/d/Y')}}</p>
                            
                                <button class="btn btn-primary">Read More</button>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                    
                </div>
            </div>
            
        </div>



    </main>
    <footer>
        <x-footer></x-footer>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

   
</body>

</html>