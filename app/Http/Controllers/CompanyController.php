<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Intervention\Image\Facades\Image;
use App\Http\Resources\Company as CompanyResource;

class CompanyController extends Controller
{
    //  Api
    public function company_list()
    {
        $companies=Company::paginate(10);
        return CompanyResource::collection($companies);
    }
    public function index()
    {  
        // $companies=Company::with('category')->get();
        // dd($companies);
        $companies=Company::all();
        
        return view('companies.index',compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }
    public function store(Request $request)
    {
        
        $validateData=$request->validate([
        'company_name'=>'required|min:3|max:40',
        'category_id'=>'required',
        'email'=>'required|email:rfc,dns',
        'number_of_employee'=>'required|numeric',
        'website'=>'required',
        'phone_number'=>'required|digits:11',
        'address'=>'required',
        'company_logo'=>'required|image'
       ]);
     
        //    $fileNameExt=$request->file('company_logo');
        //    $filename=pathinfo($fileNameExt,PATHINFO_FILENAME);
        //    $extension=$request->file('company_logo')->extension();
        //    $fileNameToStore=$filename.'_'.time().'.'.$extension;

        //    $path=$request->file('company_logo')->storeAs('',$fileNameToStore);
        $imagePath=request('company_logo')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(800,800);
        $image->save();

           Company::create(array_merge($validateData,['company_logo'=>$imagePath]));
           return \redirect('/companies')->with('success','Company Added SuccessFully!');
    }
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }
    public function update(Request $request,Company $company)
    {
        
        $data=$request->validate([
        'company_name'=>'required|min:3|max:40',
        'category_id'=>'required',
        'email'=>'required|email:rfc,dns',
        'number_of_employee'=>'required|numeric',
        'website'=>'required',
        'phone_number'=>'required|digits:11',
        'address'=>'required',
        'company_logo'=>''
       ]);
        if(request('company_logo'))
        {
        $imagePath=request('company_logo')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save(); 
        $imageArray=['company_logo'=>$imagePath];
        }
        $company->update(array_merge($data,$imageArray??[]));
        //dd($data);
        return redirect('/companies')->with('success','Company Updated SuccessFully!!');
    }
    public function destroy(Company $company)
    {
        $company->delete();
        return back();
    }
}
