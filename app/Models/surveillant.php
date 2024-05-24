<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveillant extends Model
{
    protected $primaryKey = 'id_surveillant';

    protected $fillable =[
        'nomComplet_s',
        'id_departement',
    ];
    public function departement()
    {
        return $this->belongsTo(departement::class, 'id_departement');
    }
}
