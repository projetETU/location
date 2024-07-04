<?php

namespace App\Http\Controllers;


use App\Models\Bien;
use App\Models\Client;
use App\Models\detailsLocation;
use App\Models\Location;
use App\Models\Photo;
use App\Models\Proprietaire;
use App\Models\Region;
use App\Models\V_locations;

use App\Models\Type_Bien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AdminController extends Controller
{

    function reset() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Bien::truncate();
        Photo::truncate();
        Location::truncate();
        detailsLocation::truncate();
        Proprietaire::truncate();
        Client::truncate();
        Type_Bien::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back();
    }
    public function auth(Request $request)
    {
       $credentials = $request->only('userName','password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return  redirect()->intended('admin/Dashboard');
        }else{
        return back()->withErrors("Username ou Mot de passe incorect");
        }
    }
 function importcsv(Request $request) {
    $input = "App\Models\\" . $request->input('btn');
    $request->validate([
        'import' => 'required|file|csv',
    ]);
    $path = $request->file('import')->getRealPath();
    $file = fopen($path, 'r');
    $headers = fgetcsv($file);

    try {
        while (($row = fgetcsv($file)) !== false) {
            $rowData = array_combine($headers, $row);

            if (isset($rowData['loyer'])) {
                $rowData['loyer'] = str_replace(',', '.', $rowData['loyer']);
            }

            if (isset($rowData['debut'])) {
                $rowData['debut'] = Carbon::createFromFormat('d/m/Y', $rowData['debut'])->format('Y-m-d');
            }

            $bien  =  Bien::where("reference",$rowData['biens'])->first();
            $client = Client::where("email",$rowData['client'])->first();
             $location =  $input::create([
                "client" => $client->id_clients,
                "biens" => $bien->id_biens ,
                "duree" => $rowData['duree'] ,
                "debut" => $rowData['debut']
             ]);

            $type  = Type_Bien::where("id_type_biens",$bien->type_bien)->first();

            for ($i=1; $i <= $rowData['duree']; $i++) {
                    $dateDebut = Carbon::parse($rowData['debut'])->addMonths($i - 1);

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

                    $id = Location::orderBy("id_location","desc")->first();
                    detailsLocation::create(
                        [
                            "id_location" => $id->id_location,
                            "biens" => $rowData['biens'],
                            "clients" => $rowData['client'] ,
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

        }
        fclose($file);
        return redirect()->back()->with('success', 'Importation réussie avec succès');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', $th->getMessage());
    }
 }
//  function csvBien(Request $request) {
//     $input = "App\Models\\" . $request->input('btn');
//     $request->validate([
//         'import' => 'required|file|csv',
//     ]);
//     $path = $request->file('import')->getRealPath();
//     $file = fopen($path, 'r');
//     $headers = fgetcsv($file);
//     try {
//         while (($row = fgetcsv($file)) !== false) {
//             $rowData = array_combine($headers, $row);
//             $proprio = Proprietaire::where("numero",$rowData['proprietaire'])->first();
//                 $input::create([
//                 "name" => $rowData['name'],
//                 "description" => "test" ,
//                 "type_bien" => $rowData['type_bien'] ,
//                 "region" => $rowData['region'],
//                 "loyer" => $rowData['loyer'],
//                 "proprietaire" => $proprio->id_proprietaire ,

//              ]);


//         }
//         fclose($file);
//         return redirect()->back()->with('success', 'Importation réussie avec succès');
//     } catch (\Throwable $th) {
//         return redirect()->back()->with('error', $th->getMessage());
//     }
//  }

 function ca(Request $request)  {

    // $year =  $request->input("year");
    $debut = Carbon::parse($request->input("debut"))->format("Y-m-d");
    $fin = Carbon::parse($request->input("fin"))->format("Y-m-d");

    $fin = $request->input("fin");

    $results = DB::select("
    SELECT

        SUM(loyer) AS caParMois ,
        SUM(valeurCommission) AS valeurCommission
    FROM
        location_details
    WHERE
         DATE_FORMAT(mois, '%Y-%m') BETWEEN DATE_FORMAT('$debut', '%Y-%m') AND DATE_FORMAT('$fin', '%Y-%m')

");

    return view('Admin.CaResult',["results"=>$results]);
 }

 function caProproprio(Request $request)  {

    $debut = $request->input("debut");
    $fin = $request->input("fin");
    $proprio =  $request->session()->get('id_proprietaire');
    $results = DB::select("
    SELECT
        DATE_FORMAT(mois, '%Y-%m') AS month,
        SUM(gainProprio) AS Gain
    FROM
        location_details
    WHERE
        DATE_FORMAT(mois, '%Y-%m') BETWEEN DATE_FORMAT('$debut', '%Y-%m') AND DATE_FORMAT('$fin', '%Y-%m') AND  proprio = '$proprio'
    GROUP BY
        DATE_FORMAT(mois, '%Y-%m')
");

    return view('Proprio.caProprio',["results"=>$results]);
 }
 function  loyer(Request $request) {
         $location = V_locations::all();
         return view('Admin.Liste',["results"=>$location]);
 }
 function  dLocations(Request $request) {
    $id_locations =  $request->input("locations");

    $results = DB::select("

 SELECT
       id_location , biens , clients , mois , loyer , valeurCommission , commission ,
     CASE
        WHEN DATE_FORMAT(mois, '%Y-%m')  <= DATE_FORMAT(CURRENT_DATE ,'%Y-%m' ) THEN 'green'
        ELSE 'red'
    END AS status
    FROM
        location_details
    WHERE
      id_location = '$id_locations'

");


    return view('Admin.DetailsListe',["results"=>$results]);
}


}
