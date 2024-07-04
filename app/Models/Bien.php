<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "biens";
    protected $fillable = ["name","region","loyer","type_bien","proprietaire","reference"];
}
