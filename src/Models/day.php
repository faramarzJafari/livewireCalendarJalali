<?php

namespace fara\livewirecalendarjalali\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class day extends Model
{
    use HasFactory;

    protected $fillable=[
        'timestamp',
        'year',
        'month',
        'day',
        'day_of_week',
        'isFirstDayOfMonth',
        'holiday',
        'event',
        'event_name',
        'event_description',
        'description'
    ];

    public function events(){
        
        return $this->hasMany(calendarEvent::class);
    }

}

