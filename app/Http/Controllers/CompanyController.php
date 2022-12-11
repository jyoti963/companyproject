<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);
        return view('company.index', compact('companies'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $data = $request->all();

        $company = new Company();
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->website = $data['website'];

        if($request->hasFile('company_logo')){
            $image_tmp = $request->file('company_logo');
            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate New Image Name
                $imageName = rand(111,99999).'.'.$extension;
                $imagePath = 'companies/image/company_logo/'.$imageName;
                // Upload the Image
                Image::make($image_tmp)->resize(100,100)->save($imagePath);
                $company->logo = $imageName;
            }
        }else{
            $company->company_image = "";
        }

        $company->save();
        return redirect()->route('company.index')->with('success',"Company Data Added Successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $data = $request->all();


        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->website = $data['website'];

        if($request->hasFile('company_logo')){
            $image_tmp = $request->file('company_logo');
            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate New Image Name
                $imageName = rand(111,99999).'.'.$extension;
                $imagePath = 'companies/image/company_logo/'.$imageName;
                // Upload the Image
                Image::make($image_tmp)->resize(100,100)->save($imagePath);
                $company->logo = $imageName;
            }
        }else{
            $company->company_image = "";
        }

        $company->save();
        return redirect()->route('company.index')->with('success',"Company Data Updated Successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')->with('delete', 'Company deleted successfully!!');
    }
}
