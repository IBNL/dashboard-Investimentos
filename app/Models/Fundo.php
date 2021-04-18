<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundo extends Model
{
    use HasFactory;

    protected $table = "fundos";
    protected $fillable = [
        'name',
    ];

    public function fundos($dateInicio, $dateFim){
        return $this->hasMany(Patrimonio::class)->whereBetween('date', [$dateInicio,$dateFim]);
    }



}
