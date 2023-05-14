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

    public function scopeIdSearch($query,$id){
        if(!empty($id)){
            $query->where('user_id',$id);
        }
    }

    public function scopeNameSearch($query,$name){
        if(!empty($name)){
            $query->whereHas('user', function($q)use($name){$q->where('name', 'like','%'.$name.'%');});
        }
    }

    public function scopeStartDateSearch($query,$startDate){
        if(!empty($startDate)){
            $query->whereDate('working_start', '>=', $startDate);
        }
    }

    public function scopeEndDateSearch($query,$endDate){
        if(!empty($endDate)){
            $query->whereDate('working_start', '<=', $endDate);
        }
    }
}
