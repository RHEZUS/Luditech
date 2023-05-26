<!doctype html>
<html lang="en">

<head>
    <title>Luditech Causes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body class="bg-white">
  <header>
    <x-header></x-header>
  </header>
  <main>
    <section class="our_cuauses" style="margin-top: 100px">
        <h2>OUR CAUSES</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. </p>
        <div class="container-fluid container-lg my-4" >
            <div class="row  w-100  m-0">
                @foreach ($causes as $cause)
                <div class="col-xs-12 col-sm-6 col-lg-4  px-2">
                    <div class="container-fluid item p-0">
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