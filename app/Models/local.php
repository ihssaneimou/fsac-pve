<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_local';
    protected $fillable =[
        'num_local',
        'type_local',
    ];
    
}
