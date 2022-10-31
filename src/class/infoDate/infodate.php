<?php

namespace fara\livewirecalendarjalali\class\infodate;

use fara\livewirecalendarjalali\Models\calendarEvent;
use fara\livewirecalendarjalali\Models\day;

class infodate{

    public $timestamp;

    public function __construct($timestamp=null)
    {
        $timestamp==null?$this->timestamp =jdate():$this->timestamp = $timestamp;



    }

    public function addEvent($timestamp,$event_title,$description,$event_status){
        // dd($timestamp);        
        $event=day::where('timestamp',$timestamp)->first()->id;
        $Eventsday=day::find($event)->events()->firstOrCreate([
            'event'=>$event_title,
            'description'=>$description,
            'event_status'=>$event_status,
        ]);        
        return $Eventsday?$Eventsday:false;
    }

    public function getevent($timestamp){
        $event_id=day::where('timestamp',$timestamp)->first()->id;
        $events=day::find($event_id)->events()->get();

        return $events;
    }

    public function deleteEvent($id){
        $event=calendarEvent::find($id)->delete();
         return $event?true:false;
    }

    public function deleteAllEvents($timestamp){
        $day = day::where('timestamp',$timestamp)->first();
        return $day->events()->delete();
    }

    public  function setHolidayWeek($year,$month,$day){
        $holiday_day_of_week=day::where('day_of_week',$day)
        ->where('year',$year)
        ->where('month',$month)->get('timestamp');
            
        foreach($holiday_day_of_week as $day){
            $holiday_status=day::where('timestamp',$day['timestamp'])->pluck('holiday');
            $holiday=day::where('timestamp',$day['timestamp'])->update(['holiday'=>!$holiday_status->first()]);
        }

    }

}
