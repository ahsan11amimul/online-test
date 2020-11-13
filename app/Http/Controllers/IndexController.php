<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Company;
use App\Category;
class IndexController extends Controller
{
    public function index()
    {
        return view ('index');
    }
    public function register(Request $request)
    {
        if($request->isMethod('POST'))
        {
        $validateData=$request->validate([
        'name'=>'required|min:3|max:40',
        'username'=>'required|min:3|max:40|unique:users,username',
        'email'=>'email:rfc,dns|unique:users,email',
        'password'=>'required|min:6|confirmed',
        'dob'=>'required|date'
       ]);
       
       $validateData['password']=bcrypt($validateData['password']);
       //dd($validateData);
       //$hashed_password=Hash::make($validateData['password']);
      
       //User::create(array_merge($validateData,['password'=>$hashed_password]));
       User::create($validateData);
       return redirect('/login')->with('status','Registration SuccessFully!!!');
        }else{
            return view('register');
        }
    }
 public function login(Request $request)
    {
    if($request->isMethod('POST'))
     {
        $validateData=$request->validate([
           'email'=>'required|email',
           'password'=>'required'
        ]);
    //  $email=$validateData['email'];
    //  $password=$validateData['password'];
    
        if( Auth::attempt($validateData))
            {
                return redirect('/dashboard')->with('success','Welcome to your dashboard');
            }
            else
            {
                return redirect()->back()->with('error','Invalid Credentials !!');
            }
        }
    else{
            return view('login');
        }
    }
    public function dashboard()
    {
        return view('dashboard');
    }
     public function search(Request $request)
   {
      $data= $request->validate([
         'query'=>'required|min:2|max:30|string',
       ]);
      
       $query=$data['query'];
      
       $category=Category::where('name','like',"%$query%")->first();

       if($category)
       {
       $companies=Company::where('company_name','like',"%$query%")
       ->orWhere('category_id',$category->id)->get();
       }else{
            $companies=Company::where('company_name','like',"%$query%")->get();
       }

       
       return view('search',compact('companies'));
   }
   public function logout(Request $request)
   {
       Auth::logout();
       return redirect('/');
   }
}
