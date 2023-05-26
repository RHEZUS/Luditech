<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body class="bg-white">
    <header>
        <x-header></x-header>
    </header>
    <main>
        <section class="homepage-section-4 p-4 latest-post">
                
            <h2>All Articles</h2>
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