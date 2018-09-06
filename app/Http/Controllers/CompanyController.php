<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Shkruani emrin e kompanise'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        };

        Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'logo' => $request['logo'],
            'website' => $request['website']
        ]);

        return redirect()->route('company.index');

    }

    public function edit($id){
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request){

        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Shkruani emrin e kompanise'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        };

        Company::find($request['id'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'logo' => $request['logo'],
            'website' => $request['website']
        ]);

        return redirect()->route('company.index');

    }

    public function destroy(Request $request){
        $company = Company::find($request['id']);
        $company->delete();
        return redirect()->back();
    }
}
