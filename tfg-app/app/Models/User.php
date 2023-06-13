<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atributos que se pueden serializar (Rellenables).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doctor_id',
        'name',
        'surname',
        'birthday',
        'dni',
        'image',
        'email',
        'password',
    ];

    /**
     * Foto por defecto del usuario
     * @var string
     */
    public $default_img = "default_user.png";

    /**
     * Attributos ocultos o que no pueden ser serializados.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Atributos que deben ser casteados.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    /**
     * Devuelve todas las citas del paciente
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}