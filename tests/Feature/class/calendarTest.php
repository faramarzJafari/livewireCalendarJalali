<?php

namespace Tests\Feature\class;

use App\Http\Livewire\class\calendar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Morilog\Jalali\Jalalian;
use Tests\TestCase;

class calendarTest extends TestCase
{
   use RefreshDatabase;
    public function testInitialize_calendar()
    {
        $obJCalendar = new calendar();
        $init = $obJCalendar->initialize_calendar(1401,07);
        $this->assertEquals($init[0],1663878600);       
        $this->assertEquals($init[29],1666384200);
        $this->assertEquals($init["start_timestamp"],1663878600);
        $this->assertEquals($init["DayOfWeek"],6);
        $this->assertEquals($init["num_day_of_mounth"],30);
        $this->assertEquals($init["end_timestamp"],1666384200);
        $this->assertEquals($init["befor_month_num_day"],31);  
    }

    public function testIstoday(){

        $today = jdate();
        $year = $today->getYear();
        $month = $today->getMonth();
        $day = $today->getDay();

        $obJCalendar = new calendar();
        $istoday = $obJCalendar->is_today($year,$month,$day);
        $this->assertEquals($istoday,true);

    }

    public function testGetToday(){
        $obJCalendar = new calendar();
        $today = $obJCalendar->getToday();
        $jdate = jdate();
        
        $this->assertEquals($today->getYear(),$jdate->getYear()); 
        $this->assertEquals($today->getMonth(),$jdate->getMonth());
        $this->assertEquals($today->getDay(),$jdate->getDay());
    }

    public function testGetInfoDay(){
        $now = jdate();
        $time = new Jalalian($now->getYear(),$now->getMonth(),$now->getDay(),0,0);
        $dayOfweek = match($now->getDayOfWeek()){
            0=>'شنبه',
            1=>'یکشنبه',
            2=>'دوشنبه',
            3=>'سه شنبه',
            4=>'چهارشنبه',
            5=>'پنجشنبه',
            6=>'جمعه',
        };
        $obJCalendar = new calendar();        
        $info = $obJCalendar->get_info_day($time->getTimestamp());            
        $this->assertEquals($info->timestamp,$time->getTimestamp()); 
        $this->assertEquals($info->year,$now->getYear());
        $this->assertEquals($info->month,$now->getMonth());
        $this->assertEquals($info->day,$now->getDay());
        $this->assertEquals($info->day_of_week,$dayOfweek);
        $this->assertEquals($info->isFirstDayOfMonth,1);        
    }
}
