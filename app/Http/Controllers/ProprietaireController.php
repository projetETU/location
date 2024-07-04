<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Photo;
use App\Models\Proprietaire;
use App\Models\Region;
use App\Models\Type_Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ProprietaireController extends Controller
{
    public function auth(Request $request)
    {
        $numero = $request->input('numero');
        $proprietaire = Proprietaire::where('numero', $numero)->first();

        if (!$proprietaire) {
            return back()->withErrors("Numero introuvable");
        }

        $id = $proprietaire->id_proprietaire;

        $request->session()->put('id_proprietaire', $id);
        $request->session()->regenerate();

        return redirect()->intended('Propietaire/Dashboard');
    }
        function formBien() {
        $type_bien = Type_Bien::all();
        $region = Region::all();
        return view("Proprio.formBien",
        ["type_bien"=>$type_bien,
        "region"=>$region
        ]);
    }
    public function create(Request $request)
    {
        $request->validate([
            "photo.*" => "required|image|mimes:jpeg,png,jpg,gif",
            "name" => "required",
            "region" => "required",
            "loyer" => "required|numeric",
        ]);

        $bien = new Bien();

        $bien->name = $request->input('name');
        $bien->description = $request->input('desc');
        $bien->region = $request->input('region');
        $bien->loyer = $request->input('loyer');
        $bien->reference = $request->input('Reff');
        $bien->type_bien =  $request->input('type');
        $bien->proprietaire = $request->session()->get('id_proprietaire');
        $bien->save();

        if ($request->hasFile('photo')) {
            $images = $request->file('photo');
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                Photo::create([
                    "path_photo" => 'images/' . $imageName,
                    "biens" => $bien->id,
                ]);
            }
            return back()->with('success', 'Bien créé avec succès.');
        }

        return back()->withErrors(['images' => 'Échec du téléchargement de l\'image.']);
    }

    function mesBiens(Request $request){
        $biens = Bien::where("proprietaire",$request->session()->get('id_proprietaire'))->get();
        return view("Proprio.mesBiens",
        [
            "biens" => $biens
        ]);
    }

}


