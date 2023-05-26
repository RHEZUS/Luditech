
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    </head>
    <body style="background-color: white;">
        <header>
            <x-header></x-header>
        </header>
        <main>
            <section class="carosal-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="client owl-carousel owl-theme">
                                <div class="item">
                                    <div class="text">
                                        <h3>CHILDREN NEED YOUR HELP</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim <br> ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                                        <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                        <h5><a href="#">CONTACT US</a></h5>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="text">
                                        <h3>CHILDREN NEED YOUR HELP</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim <br> ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                                        <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                        <h5><a href="#">CONTACT US</a></h5>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="text">
                                        <h3>CHILDREN NEED YOUR HELP</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim <br> ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                                        <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                        <h5><a href="#">CONTACT US</a></h5>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="text">
                                        <h3>CHILDREN NEED YOUR HELP</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim <br> ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                                        <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                        <h5><a href="#">CONTACT US</a></h5>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="text">
                                        <h3>CHILDREN NEED YOUR HELP</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim <br> ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                                        <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                        <h5><a href="#">CONTACT US</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="our_activity bg-light">
                <div class="container-fluid container-md">
                    <ul class="activities">
                        <li class="act_item item-1">
                            <article class="infobox">
                                <h6 class="title"><i class="fa-sharp fa-solid fa-scale-balanced me-2"></i><a href="#"> Sollicitudin</a></h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quidem deleniti cum [&hellip;]</p>
                                <a href="#" class="more float-end text-decoration-none">Read More</a>
                            </article>
                        </li>
                        <li class="act_item item-1">
                            <article class="infobox">
                                <h6 class="title"><i class="fa-solid fa-sack-dollar me-2"></i><a href="#"> Rhoncus</a></h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quidem deleniti cum [&hellip;]</p>
                                <a href="#" class="more float-end text-decoration-none">Read More</a>
                            </article>
                        </li>
                        <li class="act_item item-1">
                            <article class="infobox">
                                <h6 class="title"><i class="fa-solid fa-motorcycle me-2"></i><a href="#"> Fringalla</a></h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quidem deleniti cum [&hellip;]</p>
                                <a href="#" class="more float-end text-decoration-none">Read More</a>
                            </article>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="our_cuauses">
                <h2>OUR CAUSES</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. </p>
                <div class="container-fluid container-md" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="our_cuauses_single w-100 owl-carousel owl-theme w-100 m-0">
                                @foreach ($causes as $cause)
                                <div class="item">
                                    <img src="{{ asset('storage/thumbnails/'.$cause->thumbnail)}}" alt="">
                                    <div class="details">
                                        <h2>{{$cause->title}}</h2>
                                        <p style="height: 210px;">{{$cause->description}}</p>
                                        <div class="progress-text">
                                            <p class="progress-top" style="--width:{{($cause->actual_donation * 100) /($cause->exp_donation).'%'}};">{{($cause->actual_donation * 100) /($cause->exp_donation)}} %</p>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{($cause->actual_donation * 100) /($cause->exp_donation).'%'}};"></div>
                                            </div>
                                            <p class="progress-left">Raised: <span>{{'$'.$cause->actual_donation}}</span></p>
                                            <p class="progress-right">Goal: <span>{{'$'. $cause->exp_donation}}</span></p>
                                        </div>
                                        <h2 class="borderes" style="padding-top: 10px;"><a href="#">DONATE NOW</a></h2>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="block-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-6 for-border">
                            <div class="block">
                                <p><i class='bx bxs-heart'></i></p>
                                <p class="counter-wrapper"><span class="fb"></span></p>
                                <p class="text-block">CAUSES</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6 for-border">
                            <div class="block">
                                <p><i class='bx bx-user-plus' ></i></p>
                                <p class="counter-wrapper"><span class="bike"></span></p>
                                <p class="text-block">VOLUNTEERS</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6 for-border">
                            <div class="block">
                                <p><i class='bx bx-user'></i></p>
                                <p class="counter-wrapper"><span class="coffee"></span></p>
                                <p class="text-block">SAVED</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="homepage-section-4 p-4 latest-post">
                
                <h2>Latest Articles</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. </p>
                
                <div class="container">
                    
                    <div class="row">
                        @foreach ($posts as $post)


                        <div class="col-md-4">
                            <div class="article-container w-100">
                                <div class="article-image w-100" style="background-image: url('{{ asset('storage/thumbnails/'.$post->thumbnail)}}');"></div>
                                <div class="body w-100 py-3">
                                    <div class="article-infos w-100 px-3" style="border-top: 1px solid darkgrey;">
                                        <div class="title d-flex align-items-center w-100">
                                            <h4>{{$post->title}}</h4>
                                        </div>
                                        <div class="description d-flex align-items-center w-100">
                                            <p> {{$post->desc}}</p>
                                        </div>
                                        <div class="details w-100">
                                            <small class="d-flex align-items-center" style="height: 30px;"><span class="me-3">ON: {{$post->updated_at->format('m/d/Y')}}</span> <span>By: Ludivin</span></small>
                                        </div>
                                    </div>
                                    <div class="learn-more w-100 text-end px-3">
                                        <a href="#" >Read More...</a>
                                    </div>
                                </div>
                                    
                            </div>
                            
                        </div>  
                        @endforeach
                        
                    </div>
                </div>
                
            </section>



        </main>
        <footer>
            <x-footer></x-footer>
        </footer>

    </body>

</html>