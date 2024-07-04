<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Bien extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "type_biens";
    protected $fillable = ["name","commission"];
}
