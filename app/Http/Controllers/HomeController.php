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
        $data['posts'] = Article::orderBy('updated_at', 'desc')->take(3)->get();
        $data['causes'] = Cause::orderBy('updated_at', 'desc')->take(3)->get();
        return view('Website/home',$data);
    }
}
