<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name', 'email', 'specialist', 'experienceYears', 'phone', 'description'];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
