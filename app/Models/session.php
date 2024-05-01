<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{  protected $primaryKey = 'id_session';
    protected $fillable = ['nom_session', 'type_session'];
}