@extends('../layouts.website_layout')
@section('navbar') 

@section('content')

        <!-- Article title -->
        <div class="title my-5">
            <h1>Lorem ipsum dolor, sit amet consectetur.</h1>
        </div>



        <!-- Article thumbnail -->

        <div class="article-thumbnail my-3">
            <img src="images/UG-Student.webp" style="border: 1px solid violet; width: 100%;  height: 500px;" alt="">
        </div>

        <!-- Article Details  (Author, date, category, tags)-->
        <div class="details mb-3">
            <ul class="d-flex m-0 p-0 align-items-center" style="list-style: none;">
            <li class="author "><img src="images/user default.webp" alt="user pp" style="width: 40px; height: 40px; border-radius: 50%;"> <span class="mx-2">Admin</span></li>
            <li class="publication-date mx-2"><i class="fa fa-clock"></i><span class="mx-2">12.4.2023</span></li>
            <li class="categoty mx-2"><span>Programming</span></li>
            <li class="tags mx-2"><i class="fa fa-tag"></i> Laravel</li>
            </ul>
        </div>

        <!-- Article content -->
        <div class="post-content mb-5">
            <p class="mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima architecto nihil 
                quia eum autem sint quam! Ad placeat mollitia inventore reiciendis, asperiores 
                fugit alias quis. Quidem eaque placeat libero odio quia harum, mollitia laudantium 
                cum ducimus. Error quod non sit, ipsam aspernatur id ut, eligendi eveniet 
                cumque maxime temporibus nesciunt.
            </p>
            <h5 class="mb-3">Partie 1.2: Les efforts qui menent au success</h5>
            <p class="mb-3">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias rem sunt natus quo vero
                qui voluptatibus velit dignissimos numquam tempore. 
                Vel consequatur illo repudiandae laboriosam minus omnis, tenetur quod dignissimos impedit
                ut error ex, ratione quidem. Iure, mollitia quibusdam reprehenderit laboriosam consequatur, 
                vel dolores deserunt fugiat natus reiciendis, iusto cupiditate?
            </p>
            
        </div>

        <!-- Simmilar articles -->
        <div class="simmilar-articles bg-light mb-5" style="height: 200px; width: 100%; ">

            

        </div>

        <!-- Comments -->
        <div class="comment mb-5">

            <div class="comments  mb-5" >
            <div class="comment-box d-flex bg-light rounded py-2 mx-2 mb-2">
                <div class="profi px-2">
                <img  src="images/user default.webp" style="width: 40px; height: 40px; border-radius: 50%;" alt="">
                </div>
                <div class="comment-content">
                <h4>Writer's name</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, dignissimos impedit debitis excepturi eaque officiis? Delectus, accusantium tenetur animi temporibus, ratione expedita dolor itaque aliquid non, error ab rerum quo!</p>
                </div>
            </div>
            <div class="comment-box d-flex bg-light rounded mb-2 ml-3 mx-4">
                <div class="profi px-2">
                <img  src="images/user default.webp" style="width: 40px; height: 40px; border-radius: 50%;" alt="">
                </div>
                <div class="comment-content">
                <h4>Writer's name</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, dignissimos impedit debitis excepturi eaque officiis? Delectus, accusantium tenetur animi temporibus, ratione expedita dolor itaque aliquid non, error ab rerum quo!</p>
                </div>
            </div>
            </div>

            <!-- Add a new Comment -->
            <form action="#">
            <div class="mb-3">
                <input type="email" class="form-control" name=""  placeholder="Write your email">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="" id="" rows="3" placeholder="Write your comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection



@section('footer')