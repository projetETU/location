<?php

namespace App\Http\Controllers;

use App\Models\Type_Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TypeBienController extends Controller
{
    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'commission' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Type_Bien::firstOrCreate(
            [
                "name"=>$request->input('name'),
                "commission"=>$request->input('commission'),
            ]
        );
        return redirect()->back();
    }
}
