<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reservation extends Model
{
    protected $fillable = ['date', 'time', 'remarks', 'user_id'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
