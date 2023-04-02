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

</head>

<body>
    <div class="container-flex" style="padding: 0%; display: flex;" >
        @section('sidebar')
            <nav class="sidebar">
                <header>
                    <div class="logo-text">
                        <img class="logo" src="{{asset('images/logo.webp')}}" alt="">
                        <h3 class="list-item-lable">Codinglab <br> <span>web development</span></h3>
                    </div>
                </header>
                <main>
                    <ul class="menu">
                        <li class="list-item search-box">
                            <i class='bx bx-search' ></i>
                            <input class="list-item-lable" type="text" name="search" id="search">
                        </li>
                        <a href="{{route('dashboard')}}"><li class="list-1-item"><i class='bx bx-home' ></i><span class="list-item-lable" id="dashboard"> Dashboard </span></li></a>
                        <a href=""><li class="list-1-item"><i class='bx bx-bar-chart-alt-2'></i><span class="list-item-lable"> Articles</span>
                            <ul class="dropdown" id="sidebar-dropdown">
                                <a href="{{route('list_article')}}" class="nav-link active"><li>All articles</li></a>
                                <a href="{{route('create_article')}}" class="nav-link active"><li>Add New</li></a>
                                <a href="#" class="nav-link active"><li>Add New</li></a>

                            </ul>
                        </li></a>
                        <a href=""><li class="list-1-item"><i class='bx bx-bell' ></i><span class="list-item-lable"> Notification</span></li></a>
                        <a href=""><li class="list-1-item"><i class='bx bx-pie-chart-alt'></i><span class="list-item-lable"> Analyses</span></li></a>
                        <a href=""><li class="list-1-item"><i class='bx bx-heart'></i><span class="list-item-lable"> Likes</span></li></a>
                        <a href=""><li class="list-1-item"><i class='bx bx-wallet' ></i><span class="list-item-lable"> Wallet</span></li></a> 
                    </ul>
                </main>
                <footer><br>
                    <ul class="menu-footer">
                        <a href=""><li class="list-item"><i class='bx bx-log-out' ></i> <span class="list-item-lable"> Logout</span></li></a>
                        <li class="list-item">
                            <div class="sun-moon">
                                <i class='bx bx-sun' ></i> 
                                <i class='bx bx-moon' ></i>
                            </div>
                            <div class="list-item-lable">
                                Dark mode

                                <span class="toggle"></span>
                            </div> 
                            
                        </li> 
                    </ul>
                </footer>
            </nav>
        
            <div class="page-content">

                <div class="top-navbar-row">
                    <div class="user-div">
                        <ul class="user-ul">
                            <li class="user">
                                <p><span class="uname">Welcome Admin</span> <img src="{{asset('images/user default.webp')}}" alt=""></p>
                                <a href="#"><ul class="logout">
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

 </body>

</html>