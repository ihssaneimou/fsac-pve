<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablette extends Model
{
    protected $primaryKey = 'id_tablette';
    protected $fillable = ['adresse_mac','statut', 'code_association'];

}