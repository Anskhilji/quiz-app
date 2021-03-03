<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\Json;
use Validator;
class JsonController extends Controller
{
    public function json()
    {
    	$json_record = Json::first();

    	if ($json_record) {
    		$history = json_decode($json_record->json_name,true);
    	}else{
    		$history = array();
    	}


  	return view('json',compact('history'));
    }

    public function JsonStore(Request $request)
    {
    	$old_record = Json::first();
        // dd(json_decode($old_record->json_name));
    	if ($old_record) {

	    	$old_array = json_decode($old_record->json_name);
	    	$old_array[] = ['name'=>request('json_name'), 'date' => date("h:i:s A")];

	    	Json::where('id',1)->update([
	    		'json_name' => json_encode($old_array),
	    	]);
    	}
    	else{
    		 $old_array = array();
            $old_array[] = ['name'=>request('json_name'), 'date' => date("h:i:s A")];

            Json::create([
                'json_name' => json_encode($old_array),
            ]);
    	}

    	return back();
    }


    public function jsonMultiRow()
    {
        $json_data  = Json::first();
        $data = json_decode($json_data->json_name);
//        dd($data);
        return view('json_multi_row',compact('data'));
    }

    public function jsonStoreMultiRow(Request $request)
    {
        $final_array = array();
        foreach ($request->question as $key => $value){
            $final_array[] = [$value , $request->ans[$key]];
        }
//        dd($final_array);
        Json::create([
           'json_name' => json_encode($final_array),
        ]);

        return redirect()->back();
    }

//    AJAX
    public function AjaxForm()
    {
        return view('ajax_form');
    }

    public function StoreForm(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:forms',
            'password' => 'required'
        ]);

        if ($validation->fails()){
            return response()->json([
                'name' => $validation->errors()->get('name'),
                'email' => $validation->errors()->get('email'),
                'password' => $validation->errors()->get('password'),
            ]);
        }
        Form::insert([
           'name' => $request->name,
           'email' => $request->email,
           'password' => $request->password,
        ]);

        return json_encode('yes');
    }

}
