<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakTime extends Model
{
    use HasFactory;

    protected $fillable = ['working_hour_id','break_start','break_end'];

    public function workinghour(){
        return $this->belongsTo(WorkingHour::class);
    }
}
