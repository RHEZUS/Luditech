<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleCategory;
use App\Models\Tag;
use App\Models\ArticleTag;
use App\Models\User;

class ArticleController extends Controller
{
    public function create(){

        $data = Category:: all();

        return view('dashboard/articles/article_form')->with('category', $data);

    }

    public function store(Request $request){

        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'content'=> 'required',
            'thumbnail'=>'required',
        ]);

        
        
        if ($request->hasFile('thumbnail')) {

            $file=$request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/thumbnails', $fileName);


            if (isset($request->new_category)) {
                $category = Category::create([
                    'title'=>$request->new_category,
                ]);
                $category_id = $category->id;
                
            }else{
                $category_id = $request->category;
            }

            $article = new Article;
            $article->title=$request->input('title');
            $article->slug=$request->input('slug');
            $article->content=$request->input('content');
            $article->thumbnail=$fileName;
            $article->category_id=$category_id;
            $article->author_id=auth()->user()->id;
            $article-> save();

            

            foreach (explode(",", $request->tags) as $tag) {

                // "Example Tag" transformed into "example tag"
                $tagname = strtolower(trim($tag));
    
                // Find or create a tag if it doesn't exist
                $tag = Tag::firstOrCreate([
                    'name' => $tagname,
                    // "example tag" transformed into "example-tag"
                    'slug' => str_replace(" ", "-", $tagname),
                ]);
    
    
                // Create a new article tag (for relationship)
                ArticleTag::create([
                    'article_id' => $article->id,
                    'tag_id' => $tag->id,
                ]);

            }

            
        }
        if($article){
            return redirect()->route('list_article')->with('success','Article created successfully');
        }

        
 
    }

    public function list(){
        $data = [];
        $data['articles'] = Article::all();
        $data['category'] = Category::all();
        $data['authors'] = User::all();
        return view('dashboard/articles/article_list',$data);


    }
    public function edit($id){
        
        $data =[];
        $data['category'] = Category:: all();
        $data['article'] = Article::find($id);

        $tags = "";
        foreach ($data['article']->tags as $value) {

            $tags =$tags.str($value->tag->name) . ', ' ;

        }
        $data['tags']=$tags;

        return view('dashboard/articles/article_form',$data);
    }
    public function update(Request $request){

        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'content'=> 'required',
        ]);


        $data = Article::find($request->id);

        if ($request->hasFile('thumbnail')) {
            
            $file=$request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/thumbnails', $fileName);   

            $data->thumbnail=$fileName;
        }

        if (isset($request->new_category)) {
            $category = Category::create([
                'title'=>$request->new_category,
            ]);
            $category_id = $category->id;
            
        }else{
            $category_id = $request->category;
        }

        $data -> title = $request ->title;
        $data->slug=$request->input('slug');
        $data->content=$request->input('content');
        $data->category_id=$category_id;


        $currentArtTag = ArticleTag::where('article_id','=',$request->id)->get();

        foreach ($currentArtTag as $item) {
            $item->delete();
        }


        foreach (explode(",", $request->tags) as $tag) {

            // "Example Tag" transformed into "example tag"
            $tagname = strtolower(trim($tag));

            // Find or create a tag if it doesn't exist
            $tag = Tag::firstOrCreate([
                'name' => $tagname,
                // "example tag" transformed into "example-tag"
                'slug' => str_replace(" ", "-", $tagname),
            ]);


            // Create a new article tag (for relationship)
            ArticleTag::create([
                'article_id' => $data->id,
                'tag_id' => $tag->id,
            ]);

        }

        $data -> save();

        if ($data) {
            return redirect()->route('list_article')->with('success', 'Article modified successfully !!!');
        }
        else{
            return redirect()->back()->with('error','Unable to update');
        }

        
    }
    public function delete($id){

        $data = Article::find($id);
        $data->delete();

        $currentArtTag = ArticleTag::where('article_id','=',$id)->get();
        foreach ($currentArtTag as $item) {
            $item->delete();
        }
        return redirect()->route('list_article')->with('success', 'Article deleted successfully...');
    }

    public function filter(Request $request){
        if (isset($request->title) || isset($request->category)  || isset($request->author)) {

            

            $data = [];
            $data['category'] = Category::all();
            $data['authors'] = User::all();
            
            $data['articles'] = Article::where('title','=',$request->title)
                                        -> orWhere('category_id','=',$request->category)
                                        -> orWhere('author_id','=',$request->author)
                                        -> get();
        }else{
            
            return redirect()->route('list_article');
        }
        if($data){
            return  view('dashboard/articles/article_list',$data);
        }
        else{
            return redirect()->route('list_article');
        }
    }
}
