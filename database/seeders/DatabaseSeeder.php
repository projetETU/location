<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Proprietaire;
use App\Policies\AdminPolicy;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin::firstOrCreate([
        //     'userName' => 'admin',
        //     'password' => Hash::make('123'),
        // ]);

        // Proprietaire::firstOrCreate([
        //     'nom' => 'Jhon',
        //     'numero' => "327790045",
        // ]);
        // Proprietaire::firstOrCreate([
        //     'nom' => 'Jhonn',
        //     'numero' => "331178009",
        // ]);
        // Proprietaire::firstOrCreate([
        //     'nom' => 'Jano',
        //     'numero' => "340089076",
        // ]);


        // Client::firstOrCreate(
        //     [
        //         'nom' => 'Jhony1',
        //         'email' => "rakoto@gmail.com",
        //     ],
        // );

        // Client::firstOrCreate(
        //     [
        //         'nom' => 'Jhony2',
        //         'email' => "rajao@yahoo.com",
        //     ],
        // );
        // Client::firstOrCreate(
        //     [
        //         'nom' => 'Jhony3',
        //         'email' => "societe@gmail.com",
        //     ],
        // );
        Client::firstOrCreate(
            [
                'nom' => 'Jhony3',
                'email' => "entreprise@yahoo.com",
            ],
        );

    }
}
