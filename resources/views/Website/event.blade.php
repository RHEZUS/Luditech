
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<head>
    <title>Luditech Events</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body class="bg-white">
  <header>
    <x-header></x-header>
  </header>
  <main>
    <div class="container-fluid blog-container p-0">
      <div class="page-title d-flex align-items-center justify-content-center w-100" style="background: url('https://images.unsplash.com/photo-1571008592377-e362723e8998?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');">
              
          <div class="position-relative" style="z-index: 5;">
              <h1 class="text-center"> All Events</h1>
              <p class="text-center">Home / Blog</p>
          </div>
              
              
      </div>
      <div class="container my-5">
          
          <div class="content d-flex">
              <div class="row py-3 content-elts w-100">
                      
                @foreach ($posts as $post)


                <div class="col-sm-12 col-lg-6  col-xl-4  my-2">
                    <div class="article-container w-100">
                        <div class="article-image w-100" style="background-image: url('{{ asset('storage/thumbnails/'.$post->thumbnail)}}');"></div>
                        <div class="body w-100 py-3" style="border-top: 1px solid darkgrey;">
                            <div class="article-infos w-100 px-3">
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
      





  </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
</body>

</html>