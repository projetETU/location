<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailsLocation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "location_details";
    protected $fillable = ["id_location","loyer","biens","duree","clients","mois","num_mois","commission","valeurCommission","proprio","gainProprio"];

}
