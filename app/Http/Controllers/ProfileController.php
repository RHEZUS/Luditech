<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;

class ProfileController extends Controller
{
    //

    public function get_page(){

        return view('dashboard/profile/profile_form');

    }
    public function create(Request $request){

        $request->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required',
            'picture'=> 'required'
        ]);

        

        if ($request->hasFile('picture')) {

            $file=$request->picture;
            $fileName = time(). '.' .$file->clientExtension();
            $file->storeAs( 'public/profile_pictures', $fileName);
            


            $email_check = User::select('email') -> where('email', '=' , '$request -> email')->get();


            if ($email_check->count()) {
                return redirect() -> back() ->with('error', 'The email is already taken!!');
            }else{


                $valid = User::create([
                    'name' => $request -> username,
                    'email' => $request -> email,
                    'password' => $request ->password,
                    'is_admin' => $request -> role,
                    'profile_picture' => $fileName,
                ]);
        
                
                if ($valid) {
                    return redirect() -> back() ->with('success', 'New user created successfully!!');
                }else{
                    return redirect() -> back() ->with('error', 'There was a problem check again!!');
                }
            }
        }else{
            return redirect() -> back() ->with('error', 'There was no picture selected!!');
        }


        
    }

    public function edit($id){

        $data  = [];

        $data['users']= User::find($id);

        return view('dashboard/profile/profile_form', $data);
    }
    public function update(Request $request){

        $request->validate([
            'id'=>'required',
            'username'=> 'required',
            'email'=> 'required',
            'role' => 'required'
        ]);

        $data = User::find($request->id);

        if ($request->hasFile('picture')) {

            $file = $request->file;

            $fileName =time(). '.' .$file->clientExtension();

            $file->storeAs('public/profile_pictures', $fileName);

        
            $data -> profile_picture = $fileName;
        }

        if (isset($request->password)) {

            $data->password = $request->password;

        }

        $data -> name = $request ->username;
        $data -> email = $request ->email;
        $data -> is_admin = $request ->role;

        $data -> save();

        return redirect()-> back() -> with('success', 'updated successfully.');
    }

    public function list_profile(){

        $data = [];

        $data['users'] = User::all();

       

        return view('/dashboard/profile/profile_list', $data);
    }

    public function delete($id){
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
