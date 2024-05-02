<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passer extends Model
{
    // protected $primaryKey = [
    //    ' id_examen',
    //    'codeApogee',
    //    'id_local'
    // ];
    protected $fillable =[
        'num_exam',
        
    ];
    public function examen()
    {
        return $this->belongsTo(examen::class, 'id_examen');
    }
    public function etudiant()
    {
        return $this->belongsTo(etudiant::class, 'codeApogee');
    }
    public function local()
    {
        return $this->belongsTo(local::class, 'id_local');
    }
}
