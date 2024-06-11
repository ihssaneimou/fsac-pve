<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gerer extends Model
{
    use HasFactory;
        
        // public $primaryKey = [
        //    ' id_session',
        //    'id_administrateur'
        // ];

        
        
        public function administrateur()
        {
            return $this->belongsTo(administrateur::class, 'id_administrateur');
        }
        public function session()
        {
            return $this->belongsTo(session::class, 'id_session');
        }
       
}
