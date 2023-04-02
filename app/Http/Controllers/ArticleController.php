<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleCategory;
use App\Models\Tag;
use App\Models\ArticleTag;

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

            $deatination=storage_path('thumbnails');
            //

            $file=$request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->move( $deatination, $fileName);



            $article = new Article;
            $article->title=$request->input('title');
            $article->slug=$request->input('slug');
            $article->content=$request->input('content');
            $article->thumbnail=$fileName;
            $article-> save();

            if (isset($request->new_category)) {
                $category = Category::create([
                    'title'=>$request->new_category,
                ]);
                ArticleCategory::create([
                    'article_id'=>$article->id,
                    'category_id'=>$category->id,
                ]);
                
            }else{
                ArticleCategory::create([
                    'article_id'=>$article->id,
                    'category_id'=>$request->category,
                ]);
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
                    'article_id' => $article->id,
                    'tag_id' => $tag->id,
                ]);

            }
        }
        
 
    }

    public function list(){
        $data = [];
        $data['articles'] = Article::all();
        return view('dashboard/articles/article_list',$data);
    }
    public function edit($id){
        $cat = [];
        $cat['category'] = Category:: all();
        $data =[];
        $data['article'] = Article::find($id);
        return view('dashboard/articles/article_form',$cat,$data);
    }
    public function update(){

    }
    public function delete($id){

        $data = Article::find($id);
        $data->delete();
        return redirect()->route('list_article')->with('success', 'Article deleted suvvesfully...');
    }
}
