<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_user',
        'office',
        'cause',
        'diagnosis',
        'date',
    ];

    /**
     * Método que devuelve el paciente asociado a la cita
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
