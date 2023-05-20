<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class EventController extends Controller
{
    public function eventForm(){
        $data = Category:: all();
        return view('dashboard.events.event-form')->with('category', $data);
    }

    public function storeEvent(Request $request){
        $request->validate([
            'title'=>'required',
            'date'=>'required',
            'location'=>'required',
            'description'=>'required',
            'category'=>'required',
            'thumbnail'=>'required',
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

            $data = Event::create([
                'title'=>$request->title,
                'date'=>$request->date,
                'location'=>$request->location,
                'description'=>$request->description,
                'category_id'=>$category_id,
                'author_id'=> auth()->user()->id,
                'thumbnail'=>$fileName,
            ]);

            if ($data){
                return redirect()->route('eventForm')->with('success', 'Created successfully!!');
            }
            else{
                return redirect()->route('eventForm')->with('error', 'A problem accured!!');
            }
        }


    }

    ## list of events
    public function eventList(){
        $data = [];
        $data['event'] = Event::all();
        return view('dashboard/events/event-list',$data);
    }

    public function  editEvent($id){
        $data = [];
        $data['event'] = Event::find($id);
        $data['category'] = Category:: all();
        return view('dashboard.events.event-form',$data);
    }

    public function updateEvent(Request $request){
        $request->validate([
            'id'=>'required',
            'title'=>'required',
            'date'=>'required',
            'location'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);

        $category_id = NULL;

        $data= Event::find($request->id);

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
        $data -> location=$request->location;
        $data ->description =$request->description;
        $data -> category_id =$category_id;
        $data -> author_id = auth()->user()->id;

        $data->save();

        if($data){
            return redirect()->route('event_list')->with('success', 'Event Updated successfully!!');
        }else{
            return redirect()->back()->with('error', 'A problem accured during Update');
        }
    }

    public function deleteEvent($id){
        $data = Event::find($id);
        $data->delete();

        if($data){
            return redirect()->route('event_list')->with('success', 'Event Deleted successfully!!');
        }else{
            return redirect()->back()->with('error', 'A problem accured during Delete');
        }
    }
}
