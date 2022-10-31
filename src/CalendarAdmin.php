<?php

namespace fara\livewirecalendarjalali;

use fara\livewirecalendarjalali\class\calendar;
use fara\livewirecalendarjalali\Models\day;
use Livewire\Component;

class CalendarAdmin extends Component
{
    public $test;
    public $month;
    public $year;
    public $row;
    public $search;
    public $event;
 
    protected $queryString = ['search'];

    public function mount(){
       $obj_calendar = new calendar();
       $today = ($obj_calendar->getToday())->toArray();
       $this->month = $today['month'];
       $this->year = $today['year'];       
    }
    
    protected $rules = [
        'search' => 'min:6',
        
    ];
    

    
    public function updated($propertyName){

        $this->validateOnly($propertyName);
    }

    public function next_month(){
        $obj_calendar=new calendar();
        if($this->month==12){
            $this->year++;
            $this->month=1;
        }else{
            $this->month++;
        }
             
         $new_calendar=$obj_calendar->initialize_calendar($this->year,$this->month);
         $this->set_calendar($new_calendar);

    }

    public function previous_month(){
        $obj_calendar=new calendar();
        if($this->month==1){
            $this->month=12;
           
            $this->year--;    
        }else{
            $this->month--;
            
        }
        
         $new_calendar=$obj_calendar->initialize_calendar($this->year,$this->month);
         
         $this->set_calendar($new_calendar);

    }


    public function next_year(){
         $obj_calendar=new calendar();
         $this->year++;
         $new_calendar=$obj_calendar->initialize_calendar($this->year,$this->month);
         return $new_calendar;
    }


    public function previous_year(){
         $obj_calendar=new calendar();
         $this->year--;
         $new_calendar=$obj_calendar->initialize_calendar($this->year,$this->month);
         return $new_calendar;
    }

    public function set_calendar($param){
        $num_of_week=$param["DayOfWeek"];
        $num_day_month=$param["num_day_of_mounth"];
        $befor_month_num_day=$param["befor_month_num_day"];
        $array_for_calendar=array();
        $array_num_for_calendar=0;
        $sum_dayWeek_numDayMonth=$num_of_week+$num_day_month;        
        $number_on_calendar=1;
        for($i=($num_of_week);$i>0;$i--){
            $array_for_calendar[$number_on_calendar]=['day'=>$befor_month_num_day,'active'=>false,'event'=>false];            
            $number_on_calendar++;
            $befor_month_num_day--;
        }
        $array_for_calendar=array_reverse($array_for_calendar);
        $number_on_calendar--;        
        for($i=0;$i<=($num_day_month-1);$i++){   
            
            $obj_calendar=new calendar();            
            
            $info=$obj_calendar->get_info_day($param[$i]);
            
            $timestamp=$info['timestamp'];
            $day=$info['day'];
            $holiday=$info['holiday'];   
            
            $istoday=$obj_calendar->is_today($this->year,$this->month,$day);
            
            $event_id=day::where('timestamp',$timestamp)->pluck('id');
            // dd($event_id[0]);
            
                $event=day::find($event_id[0])->events->pluck('event_status');
    
                (isset($event[0]))?$event=$event[0]:$event=false;
            
            
            $array_for_calendar[$number_on_calendar]=['day'=>$day,'timestamp'=>$timestamp,'holiday'=>$holiday,'active'=>true,'istoday'=>$istoday,'event'=>$event];
        
            $number_on_calendar++;
        }
        if($sum_dayWeek_numDayMonth<=35){
            
            $i=1;
            $this->row=5;
            for($number_on_calendar;$number_on_calendar<=34;$number_on_calendar++){
                $array_for_calendar[$number_on_calendar]=['day'=>$i,'active'=>false,'event'=>false];
                $i++;
            }
        }
        if($sum_dayWeek_numDayMonth>35){
            
            $i=1;
            $this->row=6;
            for($number_on_calendar;$number_on_calendar<=41;$number_on_calendar++){
                $array_for_calendar[$number_on_calendar]=['day'=>$i,'active'=>false,'event'=>false];
                $i++;
            }
        }       
        // return null;
        return $array_for_calendar;
    }

    


    public function render()
    {
        $month_of_year=match($this->month){
            1=>'فروردین',
            2=>'اردیبهشت',
            3=>'خرداد',
            4=>'تیر',
            5=>'مرداد',
            6=>'شهریور',
            7=>'مهر',
            8=>'آبان',
            9=>'آذر',
            10=>'دی',
            11=>'بهمن',
            12=>'اسفند',
        };
        $obj_calendar = new calendar();
        $obj_calendar->initialize_calendar($this->year,$this->month);
        $new_calendar = $obj_calendar->initialize_calendar($this->year,$this->month);
        
        $Calendar_Alignment = $this->set_calendar($new_calendar);
        
        return view('livewire.calendar-admin',
        [
            'Calendar_Alignment'=>$Calendar_Alignment,
            'month_of_year'=>$month_of_year,'year'=>$this->year,
            ])->layout('layouts.app');
    }
}
