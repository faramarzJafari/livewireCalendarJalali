<?php

namespace fara\livewirecalendarjalali\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendarEvent extends Model
{
    use HasFactory;

    protected $fillable=[
        'day_id','event','description','event_status'
    ];
    
    public function days(){
        return $this->belongsTo(day::class,'day_id');
    }
}
