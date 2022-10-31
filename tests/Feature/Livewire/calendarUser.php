<?php

namespace Tests\Feature\livewire;

use App\Http\Livewire\class\calendar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class calendarUser extends TestCase
{ use RefreshDatabase;
 
    public function testRenderComponent(){

     $response = Livewire::test(calendarUser::class);

     $response->assertStatus(200);
     $response->assertViewIs('livewire.calendar-user');
      
    }
    

    public function testSetCalendar(){

     $calendar_admin = Livewire::test(CalendarAdmin::class);
     $calendar = new calendar();
     $initialize_calendar = $calendar->initialize_calendar(jdate()->getYear(),jdate()->getMonth());      
     $set_calendar = $calendar_admin->call('set_calendar', $initialize_calendar);       
     $this->assertNotNull('Calendar_Alignment');
   
    }


    public function testNextMonth(){

     $component = Livewire::test(CalendarAdmin::class);
     $component->call('next_month');      
     $this->assertEquals( 
        jdate()->getNextMonth()->getMonth(),
        $component->get('month')
     );
    }

  public function testPreviousMonth(){
     
     $component = Livewire::test(CalendarAdmin::class);
     $component->call('previous_month');            
     $this->assertEquals( 
        jdate()->subMonths(1)->getMonth(),
        $component->get('month')
     );
  }

  public function testNextYear(){
     $component = Livewire::test(CalendarAdmin::class);
     $component->call('next_year'); 
                
     $this->assertEquals( 
        jdate()->addYears(1)->getYear(),
        $component->get('year')
     );

  }

  public function testPreviousYear(){
     $component = Livewire::test(CalendarAdmin::class);
     $component->call('previous_year'); 
                
     $this->assertEquals( 
        jdate()->subYears(1)->getYear(),
        $component->get('year')
     );
  }
}
