<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    protected $fillable = array(
                            'nombre',
                            'apellido',
                            'edad',
                            'cargo_id',
    );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
}
