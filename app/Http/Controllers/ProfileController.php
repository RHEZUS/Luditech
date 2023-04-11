<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        ]);

        return $request->input();

        if ($request->hasFile('picture')) {

            $file=$request->picture;
            $fileName = time() . '.' . $file->clientExtension();
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
                    'profile_picture' => $request -> $fileName
        
                ]);
        
                
                if ($valid) {
                    return redirect() -> back() ->with('success', 'all information gathered!!');
                }else{
                    return redirect() -> back() ->with('error', 'There was a problem check again!!');
                }
            }
        }else{
            return redirect() -> back() ->with('error', 'There was no picture selected!!');
        }


        
    }

    public function list_profile(){

        $data = [];

        $data['users'] = User::all();

        return view('/dashboard/profile/profile_list', $data);
    }
}
