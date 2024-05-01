<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class associer extends Model
{
    protected $primaryKey = [
       ' id_affectation',
       'id_surveillant',
    ];
    public function surveillant()
    {
        return $this->belongsTo(examen::class, 'id_surveillant');
    }
    public function affectation()
    {
        return $this->belongsTo(local::class, 'id_affectation');
    }
}
