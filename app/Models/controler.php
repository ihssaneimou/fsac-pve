<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controler extends Model
{
    
        // protected $primaryKey = [
        //    ' id_administrateur', 'id_tablette' 
        // ];
        
        public function administrateur()
        {
            return $this->belongsTo(administrateur::class, 'id_administrateur');
        }
        public function tablette()
        {
            return $this->belongsTo(tablette::class, 'id_tablette');
        }
       
}