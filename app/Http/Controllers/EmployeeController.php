<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employee.index', compact('employees'));
    }

    public function create(){
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    public function store(Request $request){

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required'
        ];
        $messages = [
            'first_name.required' => 'Shkruani emrin.',
            'last_name.required' => 'Shkruani mbiemrin.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        };

        Employee::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'company_id' => $request['company'],
            'phone' => $request['contact_number']
        ]);



        return redirect()->route('employee.index');

    }

    public function edit($id){
        $companies = Company::all();
        $emploee = Employee::find($id);
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(Request $request){

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required'
        ];
        $messages = [
            'first_name.required' => 'Shkruani emrin.',
            'last_name.required' => 'Shkruani mbiemrin.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        };

        Employee::find($request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'company' => $request['company_id'],
            'phone' => $request['contact_number']
        ]);

        return redirect()->route('employee.index');

    }

    public function destroy(Request $request){
        $employee = Employee::find($request['id']);
        $employee->delete();
        return redirect()->back();
    }
}
