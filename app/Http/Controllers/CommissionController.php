<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Type_Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommissionController extends Controller
{
    function index()
    {
        $type_bien = Type_Bien::all();
        return view("Admin.commission",compact('type_bien'));
    }
    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'commission' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       Type_Bien::where('id_type_biens', $request->input('id'))
                ->update(["commission"=> $request->input('commission')]);

        return redirect()->back();
    }
}
