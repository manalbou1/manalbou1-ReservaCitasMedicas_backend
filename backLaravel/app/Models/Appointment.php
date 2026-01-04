<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','medic_id','date', 'time_start','time_end', 'status'];

    public function doctor()
    {
        #uno a uno
        return $this->belongsTo(Doctor::class, 'medic_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
