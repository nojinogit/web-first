<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','working_start','working_end'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function breaktimes(){
        return $this->hasMany(BreakTime::class);
    }
}
