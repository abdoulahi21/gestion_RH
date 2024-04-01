<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'date_debut',
        'date_fin',
        'type_absences',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }



}
