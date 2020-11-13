<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function show(User $user)
    {
      return view('profiles.show',compact('user'));
    }
    public function edit(User $user)
    {
       $this->authorize('update',$user->profile);
       return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
     $this->authorize('update',$user->profile);
      $validateData=request()->validate([
        'name'=>'required|min:3|max:40',
        'username'=>'required|min:3|max:40|unique:users,username,'.$user->id,
        'email'=>'email:rfc,dns|unique:users,email,'.$user->id,
       ]);
        $user->update($validateData);
        if(request('profile_image'))
        {
        $imagePath=request('profile_image')->store('profile','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(800,800);
        $image->save(); 
         $user->profile()->update(['profile_image'=>$imagePath]);
        }

        
         
         return redirect('/profile/'.$user->profile->user_id);
        
    }
}
