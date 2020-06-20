<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    /**
     * Present User Profile Page
     * 
     */
    public function userProfile(User $user) {
        $access = $user->id == Auth::user()->id ? true : false;
        return view('user.profile',['user'=>$user,'access'=>$access]);
    }

    /**
     * Handle User Metadata Update Request
     * 
     */
    public function updateData(Request $request, User $user)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'], 
        ]);
        $uname = $request->username;
        $check_username = User::where('username',$uname)->first();
        if(!$check_username || $uname == Auth::user()->username){
            
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->full_name = $request->first_name." ".$request->last_name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        $code = "updateData";
        $message = "Update Successfull";

        }else{
            $code = "errorUpdateData";
            $message = "Other person have same username";
        }

        return redirect()->route('profile', $user->id)->with($code, $message);
    }

    /**
     * Handle change password request
     * 
     * 
     */
    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string','min:8'],
        ]);
        $uid = $user->id;
        if($uid == Auth::user()->id){
            
        $user->password = Hash::make($request->password);
        $user->save();

        $code = "updatePassword";
        $message = "Password Update Successfull";

        }else{
            $code = "errorUpdatePassword";
            $message = "There is an error in the server";
        }

        return redirect()->route('profile', $user->id)->with($code, $message);
    }

    /**
     * Profile Picture update handler
     * 
     * 
     */
    public function changeAvatar(Request $request, User $user)
    {
        $request->validate([
            'avatar' => 'mimes:jpeg,jpg,png|required|file|max:2000',
        ]);

        $uid = $user->id;
        if($uid == Auth::user()->id){
            $ext = ".".$request->file('avatar')->extension();
            $name = rand().$ext;

            $request->file('avatar')->storeAs('public/avatars',$name);
            $user->avatar = 'storage/avatars/'.$name;
            $user->save();
            

            $code = "updateAvatar";
            $message = "Profile Picture Updated Successfully";
        }else{
            $code = "errorUpdateAvatar";
            $message = "Sorry, We've got an error in the server";
        }
        return redirect()->route('profile', $user->id)->with($code, $message);

    }
}
