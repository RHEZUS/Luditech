<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cause;
use Illuminate\Http\Request;

class CauseController extends Controller
{
    public function causeForm(){
        $data= [];
        $data['category']=Category::all();
        return view('dashboard.causes.causes-form',$data);
    }

    public function store(Request $request){

        $request -> validate([
            'title'=>'required',
            'date'=>'required',
            'exp_donation'=>'required',
            'description'=>'required',
            'category'=>'required',
            'thumbnail'=>'required'
        ]);

        if ($request->hasFile('thumbnail')) {  


            $file = $request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/thumbnails', $fileName);

            $category_id = null;

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

            $data = Cause::create([
                'title'=>$request->title,
                'date'=>$request->date,
                'exp_donation'=>$request->exp_donation,
                'description'=>$request->description,
                'category_id'=>$category_id,
                'author_id'=> auth()->user()->id,
                'thumbnail'=>$fileName,
            ]);

            if ($data){
                return redirect()->route('cause-list')->with('success', 'Created successfully!!');
            }
            else{
                return redirect()->route('cause_form')->with('error', 'A problem accured!!');
            }
        }
    }

    public function causeList(){
        $data =[];
        $data['cause']=Cause::all();
        return view('dashboard.causes.causes-list', $data);
    }
    public function editCause($id){
        $data = [];
        $data['category']=Category::all();
        $data['cause']=Cause::find($id);
        return view('dashboard.causes.causes-form',$data);
    }

    public function causeUpdate(Request $request){

        $request->validate([
            'title'=>'required',
            'date'=>'required',
            'exp_donation'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);

        $category_id = NULL;

        $data= Cause::find($request->id);

        if (isset($request->thumbnail) && $request->hasFile('thumbnail')) {
            
            $file=$request->thumbnail;
            $fileName = time() . '.' . $file->clientExtension();
            $file->storeAs( 'public/thumbnails', $fileName);  
            
            $data -> thumbnail= $fileName; 
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

        
        $data->title = $request->title;
        $data -> date=$request->date;
        $data -> exp_donation=$request->exp_donation;
        $data ->description =$request->description;
        $data -> category_id =$category_id;
        $data -> author_id = auth()->user()->id;

        $data->save();

        if($data){
            return redirect()->route('cause-list')->with('success', 'Event Updated successfully!!');
        }else{
            return redirect()->back()->with('error', 'A problem accured during Update');
        }

    }

    public function causeDelete($id){
        $data = Cause::find($id);
        $data->delete(); 

        if($data){
            return redirect()->route('cause-list')->with('success', 'Event Deleted successfully!!');
        }else{
            return redirect()->back()->with('error', 'A problem accured during Delete');
        }
    }
}
