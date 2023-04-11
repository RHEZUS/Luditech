<!doctype html>
<html lang="en">

<head>
    <title>Dashboard - @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
    

    <!-- css style file-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--fav icon-->
    <link rel="shortcut icon" href="{{asset('images/logo.webp')}}" type="image/x-icon">


    <!-- Croppie -->
    <link rel="stylesheet" href="croppie.css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

</head>

<body>
    @php
        $current_route = request()->route()->getName();
    @endphp
    <div class="container-flex" style="padding: 0%; display: flex;" >
        @section('sidebar')

            <div class="left-sidebar px-3  bg-white" style="width: 340px;">
                <div class="wrapper d-flex py-4">
                <img src="{{asset('images/logo.webp')}}" class="my-2" style="width: 50px; height: 50px;" alt="">
                <h3 class="list-item-lable px-3">Luditech<br> <span class="fs-5">web development</span></h3>
                </div>
        
                <div class="left-sidebar-items my-3" >
                <div class="item-1 my-3 py-2" style="{{$current_route  == 'dashboard' ? 'background-color: #695cfe; color: white;' : ''}}">
                    <a  href="{{route('dashboard')}}" class="item-1-elt mx-3 shadow-none" style="border: none; {{$current_route  == 'dashboard' ? 'color: white;' : ''}}">
                        <i class='bx bxs-dashboard fs-4 me-3'></i> <span>Dashboard</span> 
                    </a>
                </div>
                <div class="item-1 my-3" style="{{$current_route  == 'create_article' || $current_route  == 'list_article' ? 'background-color: #695cfe; color: white;' : ''}}">
                    <button class="btn item-1-elt  dropdown-toggle shadow-none" style="border: none; {{$current_route  == 'create_article' || $current_route  == 'list_article' ? ' color: white;' : ''}}" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-news fs-4 me-3'></i><span class="my-auto"> Article</span>
                    </button>
                    <div class="dropdown-menu border-0 w-100" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{route('create_article')}}">Add New</a>
                    <a class="dropdown-item " href="{{route('list_article')}}">All Articles</a>
                    <a class="dropdown-item" href="#">Action</a>
                    </div>
                </div>

                <?php 
                
                    if (auth()->user()->is_admin) {
                        # code...
                ?>

                <div class="item-1 my-3" style="{{$current_route  == 'get_create_user' || $current_route  == 'list_profile' ? 'background-color: #695cfe; color: white;' : ''}}">
                    <button class="btn item-1-elt dropdown-toggle shadow-none" style="border: none; {{$current_route  == 'get_create_user' || $current_route  == 'list_profile' ? ' color: white;' : ''}}" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa fa-users fs-4 me-3"></i><span> Users</span>
                        </button>
                    <div class="dropdown-menu border-0 w-100" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{route('create_user')}}">Add New</a>
                    <a class="dropdown-item " href="{{route('list_profile')}}">All Users</a>
                    <a class="dropdown-item" href="#">Action</a>
                    </div>
                </div>

                <?php 
                    }
                ?>
        
                <div class="item-1 my-3">
                    <button class="btn item-1-elt dropdown-toggle shadow-none" style="border: none;" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-clipboard fs-4 me-3' ></i><span>Training</span> 
                        </button>
                    <div class="dropdown-menu border-0 w-100"  aria-labelledby="triggerId">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item " href="#">Disabled action</a>
                    <a class="dropdown-item" href="#">Action</a>
                    </div>
                </div>
        
                <div class="item-1 my-3 py-2">
                    <a href="#" class="item-1-elt shadow-none mx-3 py-1" style="border: none;" >
                        <i class="fa fa-bar-chart fs-3 me-3"></i><span > Statistics</span>
                    </a>
                </div>
        
                <div class="item-1 my-5 py-2">
                    <div class="item">
                        <a class="item-1-elt shadow-none mx-3 py-1" style="border: none;"  >
                            <i class='bx bx-log-out fs-3 me-3' ></i><span> Logout</span>
                        </a>
                    </div>
                </div>
              
            </div>
    
              
    
          </div>
            
            <div class="page-content">

                <div class="top-navbar-row">
                    <div class="user-div">
                        <ul class="user-ul">
                            <li class="user">
                                <p><span class="uname">Welcome {{auth()->user()->name}}</span> <img style="border-radius: 50%" src="{{asset('storage/profile_pictures/'.auth()->user()->profile_picture)}}" alt=""></p>
                                <a href="{{ route('logoutu') }}"><ul class="logout">
                                    <li>Logout</li>
                                </ul></a>
                            </li>
                        </ul>
                    </div>
                    <div class=" top-menu-toggle" >
                        <i class='bx bx-menu' id="top-menu-toggle"></i>
                    </div>
                </div>
        @show

        
            <div class="containers ">
               @yield('content') 
            </div>
        
        </div>

            
        
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"> </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- FCKeditor link -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <!-- Website scripts -->
    <script src="{{asset('js/script.js')}}"></script>

    <!-- Croppie -->

    <link rel="stylesheet" href="croppie.css" />
    <script src="croppie.js"></script>

    <!-- Font awsome icons -->
    <script src="https://kit.fontawesome.com/5fe79ecddc.js" crossorigin="anonymous"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}} "></script>
    

 </body>

</html>