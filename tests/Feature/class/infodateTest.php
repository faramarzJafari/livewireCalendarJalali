<?php

namespace Tests\Feature\class;

use fara\livewirecalendarjalali\class\infodate\facade\infodate;
use fara\livewirecalendarjalali\Models\calendarEvent;
use fara\livewirecalendarjalali\Models\day;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class infodateTest extends TestCase
{
    use RefreshDatabase;
    
    public function testAddEvent(){

        day::factory()->create(); 
        $data = [    
            'event'=>'event_title',
            'description'=>'Event_description',
            'event_status'=>true
        ];       
        $event = infodate::addEvent(jdate()->getTimestamp(),'event_title','Event_description',true);        
        
        $this->assertDatabaseCount('calendar_Events',1);
        $this->assertDatabaseHas('calendar_Events',$data);
     }

public function testGetEvent(){
        

        $data = calendarEvent::factory()->for(day::factory(),'days')->create();
       
        $timestamp = $data->days->timestamp;
        $getEvent = infodate::getEvent($timestamp)->first();
        
        $event = [
            'event'=>$getEvent->event,
            'description'=>$getEvent->description,
            'event_status'=>$getEvent->event_status,
        ];
        
        $this->assertDatabaseHas('calendar_Events',$event);


}

public function testDeleteEvent(){
    $event = calendarEvent::factory()->for(day::factory(),'days')->create();
    $delete = infodate::deleteEvent($event->id);
    $this->assertDatabaseCount('calendar_Events',0);
        
}

public function testDeleteAllEvents(){
    $event = calendarEvent::factory(5)->for(day::factory(),'days')->create();    
    $timestamp = $event->first()->days->timestamp;
    $deleteAll = infodate::deleteAllEvents($timestamp);
    $this->assertDatabaseCount('calendar_Events',0);
}
 
// public function testSetHolidayWeek(){

//     $day = day::factory()->create();
//     infodate::setHolidayWeek($day->year,$day->month,$day->day_of_week);
    
// }

}
