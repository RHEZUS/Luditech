<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog(){
        $data = [];
        $data['posts'] = Article::all();
        return view('Website.blog',$data);
    }
}
