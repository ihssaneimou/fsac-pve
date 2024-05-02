<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class signer extends Model
{
    // protected $primaryKey = [
    //    ' id_surveillant',
    //    'id_pv'
    // ];
    protected $fillable =[
        'signature',
    ];

    public function surveillant()
    {
        return $this->belongsTo(surveillant::class, 'id_surveillant');
    }
    public function pv()
    {
        return $this->belongsTo(pv::class, 'id_pv');
    }
}
