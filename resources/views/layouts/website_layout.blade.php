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
    
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    @section('navbar')
        <header class="webs-menu bg-white">
            <nav class="navbar  px-2 px-lg-5 navbar-expand-lg navbar-light">
                <div class="container-fluid">
                <a class="navbar-brand" style="color: blue;" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
            
        </header>
    @show

    <main class="container-fluid row d-flex my-4 p-5" >

        <div>
            
        </div>
        <div class="content col-lg-9  p-4 bg-white rounded">
            @yield('content')
        </div>
    
        <div class="right-sidebar col-lg-3">

            @section('sidebar')
                <!-- list of categories -->
                <div class="categories  mb-5 p-2 bg-white rounded" >
                    <h4 >Categories</h4>
                    <ul class="category-list m-0 px-2" style="list-style: none;">
                        <a href="#" class="text-decoration-none text-black"><li class="category">Programming <span class="px-1 py-1 bg-light rounded" style="float: right;">25</span></li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Web security</li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Operating System</li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Infography</li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Programming</li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Web security</li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Operating System</li></a>
                        <a href="#" class="text-decoration-none text-black"><li class="category">Infography</li></a>
                    </ul>
                </div>

                <div class="liked-post bg-dark mb-5 p-2 bg-white rounded">    <!-- Most liked posts -->
                    <h4>Most Liked</h4>
                
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="card" style="border-none;">
                              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
                              <div class="card-body "style="border-none;">
                                <h5 class="card-title">POWER: Les 48 lois du pouvoir : Comment Gagner et Maintenir Le Pouvoir</h5>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="card">
                              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card 2</h5>
                                <p class="card-text">This is another sample card.</p>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="card">
                              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card 3</h5>
                                <p class="card-text">This is a third sample card.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="color:red;">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                      

                </div>

                <!-- All Tags -->
                <div class="tags mb-5 p-3 bg-white rounded">
                    <h4>Tags</h4>
                    <span class="mx-1 px-2 py-1 rounded bg-light">Laravel</span>
                    <span class="mx-1 px-2 py-1 rounded bg-light">Laravel</span>
                </div>
            @show
        </div>
        
    </main>

    @section('footer') 
        <footer class="px-3 px-lg-5 text-white" style="background-color: blue">
            <div class="row">

                <!-- Website brand -->
                <div class="brand col-lg-4 d-flex py-3">
                <a href="#" class="">
                    <img src="images/logo.webp" style="width: 80px; height: 80px;" alt="Logo is going here">
                    <span class="px-2 text-white">LudiTeck</span>
                </a>
                </div>

                <!-- Social pages -->
                <div class="social col-lg-4 py-3">
                <h4 class="m-0 p-0 fs-2">Our pages</h4>
                <ul class="social mt-3 fs-5" style="list-style: none;">
                    
                    <a href="#" class="text-decoration-none text-white"><li class="social-item"><i class="fa fa-facebook mx-2"></i> Facebook</li></a>
                    <a href="#" class="text-decoration-none text-white"><li class="social-item"><i class="fa fa-twitter mx-2"></i> Tweeter</li></a>
                    <a href="#" class="text-decoration-none text-white"><li class="social-item"><i class="fa fa-github mx-2"></i> Github</li></a>
                    <a href="#" class="text-decoration-none text-white"><li class="social-item"><i class="fa fa-instagram mx-2"></i> Instagram</li></a>
                </ul>
                </div>

                <!-- subscribe to newsletter -->
                <div class="newsletter col-lg-4 py-3">
                    <form action="#">
                    <h3>Subscribe to our newsletter</h3>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="" id=""  placeholder="Write your email">
                    </div>
                    <button type="submit" class="btn btn-light">Subscribe</button>
                    </form>
                </div>

            </div>
        </footer>
    @show
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/5fe79ecddc.js" crossorigin="anonymous"></script>
</body>

</html>