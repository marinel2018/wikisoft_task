<?php

namespace App\Http\Controllers;

use App\Emploee;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Validator;

class emploeeController extends Controller
{
    public function index(){
        $emploees = Emploee::orderBy('created_at', 'desc')->paginate(10);

        return view('emploee.index', compact('emploees'));
    }

    public function create(){
        $companies = Company::all();
        return view('emploee.create', compact('companies'));
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

        emploee::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'company_id' => $request['company'],
            'phone' => $request['contact_number']
        ]);



        return redirect()->route('emploee.index');

    }

    public function edit($id){
        $companies = Company::all();
        $emploee = emploee::find($id);
        return view('emploee.edit', compact('emploee', 'companies'));
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

        emploee::find($request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'company' => $request['company_id'],
            'phone' => $request['contact_number']
        ]);

        return redirect()->route('emploee.index');

    }

    public function destroy(Request $request){
        $emploee = emploee::find($request['id']);
        $emploee->delete();
        return redirect()->back();
    }
}
