<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('companies')->latest()->paginate(5);

        return view('employee.index', compact('employees'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::select('id','name')->get();
        return view('employee.create' , compact('company'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'company' => 'required'
        ]);

        $data = $request->all();

        $employee = new Employee();
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->email = $data['email'];
        $employee->mobile = $data['mobile'];
        $employee->company_id = $data['company'];
        $employee->save();
        return redirect()->route('employee.index')->with('success',"Employee Data Added Successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $company = Company::select('id','name')->get();
        return view('employee.edit' , ['employee' => $employee],compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'company' => 'required'
        ]);

        $data = $request->all();

        $employee = new Employee();
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->email = $data['email'];
        $employee->mobile = $data['mobile'];
        $employee->company_id = $data['company'];
        $employee->save();
        return redirect()->route('employee.index')->with('success',"Employee Data Updated Successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')->with('delete', 'Employee deleted successfully!!');
    }
}
