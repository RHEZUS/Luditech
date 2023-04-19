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

    # get the Article creation form
    public function create(){

        # Get all the categories that will be displayed in the form dropdown

        $data = Category:: all();

        return view('dashboard/articles/article_form')->with('category', $data);

    }

    # store articles
    public function store(Request $request){

        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'content'=> 'required',
            'thumbnail'=>'required',
        ]);

        

        
        if ($request->hasFile('thumbnail')) {

            # Get the file from the registration form, change the name and store in the public/thumbnail folder

            $file=$request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/thumbnails', $fileName);


            if (isset($request->new_category)) {

                #check if the new_category field is set, if true, create a new category

                $category = Category::create([
                    'title'=>$request->new_category,
                ]);
                $category_id = $category->id;
                
            }else{
                
                # if the new_category field is not set, get the category's id from the form

                $category_id = $request->category;
            }

            # store the article

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
        }else{
            return redirect()->back()->with('error','A problem accured during the registration attempt');
        }

        
 
    }

    # get the list of articles.
    public function list(){

        if (auth()->user()->is_admin) {

            $data = [];
            $data['articles'] = Article::all();
            return view('dashboard/articles/article_list',$data);

        }else{
            
            $data = [];
            $data['articles'] = Article::where('author_id', '=', auth()->user()->id)->get();
            
            return view('dashboard/articles/article_list',$data);
        }

        


    }

    # get the article update page
    public function edit($id){

        $data =[];
        $data['category'] = Category:: all();
        $data['article'] = Article::find($id);

        $tags = "";

        # get the tags of each article and convert them in a single string

        foreach ($data['article']->tags as $value) {

            $tags =$tags.str($value->tag->name) . ', ' ;

        }
        $data['tags']=$tags;

        return view('dashboard/articles/article_form',$data);
    }

    # Update an article
    public function update(Request $request){

        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'content'=> 'required',
        ]);


        $data = Article::find($request->id);

        # check if a new thumbnail image is set if yes, change the name and store is public/thumbnail folder
        if ($request->hasFile('thumbnail')) {
            
            $file=$request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/thumbnails', $fileName);   

            $data->thumbnail=$fileName;
        }

        if (isset($request->new_category)) {

            #check if the new_category field is set, if true, create a new category

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

        # delate all the existing tags which are related to the article to set the new ones.

        $currentArtTag = ArticleTag::where('article_id','=',$request->id)->get();

        foreach ($currentArtTag as $item) {
            $item->delete();
        }

        # create the new tags and relate them to the article 

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

    #delete an article
    public function delete($id){

        # delete the article

        $data = Article::find($id);
        $data->delete();

        #delete the tags related to the tag

        $currentArtTag = ArticleTag::where('article_id','=',$id)->get();
        foreach ($currentArtTag as $item) {
            $item->delete();
        }
        return redirect()->route('list_article')->with('success', 'Article deleted successfully...');
    }

}
