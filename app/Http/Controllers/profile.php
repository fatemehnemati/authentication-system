<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;

class profile extends Controller
{
    public function view(){
        return view('layout.panel');
    }


    public function myProfile(){
        if(Auth::user()){
            $user= User::find(Auth::user()->id);
            if($user){
                return view('userProfile',compact('user'));
            }
        }
    }

    public function updateProfile(Request $request){

        $user= User::find(Auth::user()->id);
        $profilePhoto= $request->file('profilePhoto');
        
        if($user){
            if($profilePhoto){
                $name_generate = hexdec(uniqid()).'.'.$profilePhoto->getClientOriginalExtension();
                Image::make($profilePhoto)->resize(100,100)->save('image/profile/'.$name_generate);
                $last_image='image/profile/'.$name_generate;
                $user->profile_photo_path = $last_image;
                $user->status = 1;
                $user->name = $request->name;
                $user->bio = $request->bio;
                $user->email = $request->email;
                $user->save();
                return redirect()->back()->with('message','your profile has been updated');    
            }else{

                $user->name = $request->name;
                $user->bio = $request->bio;
                $user->email = $request->email;
                $user->save();
                return redirect()->back()->with('message','your profile has been updated');    
            
            }
            
        }else{
            return redirect()->back()->with('message','something went wrong');
        }
    }

    public function deleteProfilePhoto(){
        $user= User::find(Auth::user()->id);
        $profilePhoto = $user->profile_photo_path;
        unlink($profilePhoto);
        user::find($user->id)->delete($user->profile_photo_path);
    }

    public function changePassword(){
        return view('userPassword');
    }

    public function updatePassword(Request $request){
        $validate = $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashed =Auth::user()->password;
        $currentPassword = $request->currentPassword;
        if(Hash::check($request->currentPassword, $hashed)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('message','your password has been changed plz login with new one');
        }
        else{
            return redirect()->route('userPassword')->with('message','your password is invalid');
        }
    }

    public function logout(){
        Auth::logout();

        return view('auth.login');
    }
}
