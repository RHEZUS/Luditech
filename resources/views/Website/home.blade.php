

<body style="background-color: white;">
    <header>
        <x-header></x-header>
    </header>
    <main>
        <div class="homepage-section-1 m-0 p-0" style="">

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
                                <h1 >Lorem ipsum dolor sit amet.</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, facere? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, facere?</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1643321611132-15f7b8a63347?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="w-100 d-block" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block" style="top:170px; z-index: 10;">
                                <h1 >Lorem ipsum dolor sit amet.</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, facere? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, facere?</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1473649085228-583485e6e4d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80" class="w-100 d-block" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block" style="top:170px; z-index: 10;">
                                <h1 >Lorem ipsum dolor sit amet.</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, facere? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, facere?</p>
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

        <div class="homepage-section-2 p-4 latest-causes">
            <div class="container">
                <div class="section-title mx-auto">
                    <h1 class="text-center"> Our causes </h1>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.  quidem suscipit aperiam ad excepturi beatae possimus! </p>
                    
                </div>
                
                <div class="row">

                    @foreach ($causes as $cause)

                    <div class="col-md-4">

                        <div class="cause-container w-100 rounded bg-light">
                            <div class="cause-image w-100" style="background-image: url('{{ asset('storage/thumbnails/'.$cause->thumbnail)}}');"></div>
                            <div class="body w-100 py-3" style="border-top: 1px solid darkgrey;">
                                <div class="cause-infos w-100 px-3">
                                    <div class="percentage d-flex align-items-center w-100">
                                        <h4>{{($cause->actual_donation * 100) /($cause->exp_donation)}} %</h4>
                                    </div>
                                    <div class="progress-bar">
                                        <p><span style="--percentage:{{($cause->actual_donation * 100) /($cause->exp_donation).'%'}};"></span></p>
                                    </div>
                                    <div class="title d-flex align-items-center w-100">
                                        <h4> {{$cause->title}} </h4>
                                    </div>

                                    <div class="details w-100">
                                        <small class="d-flex align-items-center" style="height: 30px;">Donatetion Collected {{'$'.$cause->actual_donation . ' '}} of {{'$'. $cause->exp_donation.' '}}</small>
                                    </div>
                                </div>
                                <div class="learn-more w-100 text-end px-3">
                                    <a href="#" >Donate now</a>
                                </div>
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

        <div class="homepage-section-4 p-4 latest-post">
            <div class="container">
                <div class="section-title mx-auto">
                    <h1 class="text-center"> Latest Posts </h1>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.  quidem suscipit aperiam ad excepturi beatae possimus! </p>
                    
                </div>
                
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
            
        </div>



    </main>
    <footer>
        <x-footer></x-footer>
    </footer>

</body>

</html>