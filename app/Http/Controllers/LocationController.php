<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Client;
use App\Models\detailsLocation;
use App\Models\Location;
use App\Models\Type_Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LocationController extends Controller
{
    function index() {
        $client =  Client::all();
        $bien  = Bien::all();

        return view("Admin.formLocation",
        [
            "client" => $client,
            "bien" => $bien
        ]);
    }
    function create(Request $request) {
        $request->validate(
            [
                "client" => "required",
                "bien" => "required"
            ]
        );
        Location::create(
            [
                "client" => $request->input("client"),
                "biens" =>  $request->input("bien"),
                "duree" =>  $request->input("duree"),
                "debut" =>  $request->input("debut")
            ]
        );
        $bien  =  Bien::where("id_biens",$request->input("bien"))->first();

        $type  = Type_Bien::where("id_type_biens",$bien->type_bien)->first();
        for ($i=1; $i <= $request->input("duree"); $i++) {
            $dateDebut = Carbon::parse($request->input("debut"))->addMonths($i - 1);

            if ($i == 1) {
                $loyer = $bien->loyer * 2 ;
                $commisson = 100;
                $valeurCommission = $bien->loyer;
                $gain = $bien->loyer;
            }else{
                $loyer = $bien->loyer;
                $commisson = $type->commission;
                $valeurCommission = ($bien->loyer /100)*$commisson;
                $gain = $bien->loyer - $valeurCommission;
            }


            detailsLocation::create(
                [
                    "biens" => $request->input("bien"),
                    "clients" => $request->input("client"),
                    "mois" => $dateDebut,
                    "num_mois" => $i,
                    "commission" => $commisson ,
                    "loyer" => $loyer ,
                    "valeurCommission" => $valeurCommission,
                    "proprio" => $bien->proprietaire,
                    "gainProprio" => $gain
                ],
            );

        }

        return back();
    }
}
