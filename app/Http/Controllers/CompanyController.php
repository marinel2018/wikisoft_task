<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    public function index(){
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('company.index', compact('companies'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'logo' => 'required|image|dimensions:min_width=100,min_heigh=100|max:1024'
        ];
        $messages = [
            'name.required' => 'Shkruani emrin e kompanise',
            'logo.image' => 'Duhet te zgjidhni vetem image',
            'logo.dimensions' => 'Logoja duhet te jete e pakta 100x100 pixel',
            'logo.max' => 'Foto duhet te jete me e vogel se 1 mb',
            'logo.required' => 'Zgjidhni nje logo'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        };
        $logo = $request->file('logo');
        $logo_name = $logo->getClientOriginalName();

        $logo->storeAs('public', $logo->getClientOriginalName());

        Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'website' => $request['website'],
            'logo' => $logo_name
        ]);



        return redirect()->route('company.index');

    }

    public function edit($id){
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request){

        $rules = [
            'name' => 'required',
            'logo' => 'required|image|dimensions:min_width=100,min_heigh=100|max:1024'
        ];
        $messages = [
            'name.required' => 'Shkruani emrin e kompanise',
            'logo.image' => 'Duhet te zgjidhni vetem image',
            'logo.dimensions' => 'Logoja duhet te jete e pakta 100x100 pixel',
            'logo.max' => 'Foto duhet te jete me e vogel se 1 mb',
            'logo.required' => 'Zgjidhni Logon'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        };
        $logo = $request->file('logo');
        $logo_name = $logo->getClientOriginalName();

        $logo->storeAs('public', $logo->getClientOriginalName());

        Company::find($request['id'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'website' => $request['website'],
            'logo' => $logo_name
        ]);

        return redirect()->route('company.index');

    }

    public function destroy(Request $request){
        $company = Company::find($request['id']);
        $company->delete();
        return redirect()->back();
    }
}
