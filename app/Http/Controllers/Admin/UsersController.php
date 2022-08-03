<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function UploadImage()
    {
        $user = auth() -> user();
        $profile_image_url = $user -> profile_image_url;
        $name= substr( $profile_image_url , 12 , 100 );
        $path= '\storage\\' . $name;
        return view('user.uploadimage', compact('user','path','profile_image_url'));
    } 
    public function SaveImage(Request $request)
    {   
        $path = storage_path('app\public\profile_image\\');
        $user_id = auth()->user()->id;
        $file_name = $request-> file('image') -> getClientOriginalName();
        $name = '\app\public\profile_image\\' . $file_name;
        $request->file('image')->move($path, $file_name);
        $profile_image_url = '\app\public\profile_image\\' . $file_name;
        $user = User::find($user_id); 
        $user -> profile_image_url = $profile_image_url;
        $user ->save();
        return response()->json($file_name);

    } 
}
