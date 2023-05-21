<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cause;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $data =[];
        $data['posts'] = Article::all();
        $data['causes'] = Cause::all()->last()->limit(3)->get();
        return view('Website/home',$data);
    }
}
