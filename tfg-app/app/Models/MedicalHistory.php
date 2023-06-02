<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable=[
        'emergency_phone',
        'allergies',
        'other_diseases',
        'diabetes',
        'cancer',
        'overweight',
        'epilepsy',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
