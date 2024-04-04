<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'poste_id',
        'contrat_id',
        'salaire',
        'date'
    ];
}
