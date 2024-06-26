<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Conge extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'user_id',
        'date_debut',
        'date_fin',
        'type_conge',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function conge()
    {
        return $this->hasMany(Conge::class);
    }
}
