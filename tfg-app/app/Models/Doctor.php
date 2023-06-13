<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable=[
        'hospital_id',
        'name',
        'surname',
        'birthday',
        'specialism',
        'phone',
        'years_of_experience',
        'image',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
