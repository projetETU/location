<?php
namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function auth(Request $request)
    {
        $email = $request->input('email');
        $client = Client::where('email', $email)->first();

        if (!$client) {
            return back()->withErrors("Email introuvable");
        }

        $id = $client->id_clients;

        $request->session()->put('id_clients', $id);
        $request->session()->regenerate();

        return redirect()->intended('Client/Dashboard');
    }
    // function loyer(Request $request) {
    //     $debut = Carbon::parse($request->input("debut"))->format("Y-m-d");
    //     $fin = Carbon::parse($request->input("fin"))->format("Y-m-d");




    // }
}
