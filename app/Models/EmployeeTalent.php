<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTalent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'langue',
        'skill',
        'certification'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
