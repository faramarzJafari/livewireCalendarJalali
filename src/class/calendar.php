<?php 
namespace fara\livewirecalendarjalali\class;

use fara\livewirecalendarjalali\Models\day;
use fara\livewirecalendarjalali\Models\User;
use Exception;
use Morilog\Jalali\Jalalian;

class calendar{

    public $time;
    public $now;
    public $today;
    public $year;
    public $month;
    public $day;
    public $first_day_weekDay;
    public $timestamp;
    public $obj_with_day;
    public $obj_without_day;
    public $name_event;
    public $description_event;
    public $description=null;


    public function __construct()
    {
        
            $this->time = jdate(); 
            $this->now = $this->time;
            $this->year = $this->time->getYear();
            $this->month = $this->time->getMonth();
            $this->day=$this->time->getDay();            
            $this->today=(new Jalalian($this->year,$this->month,$this->day));                       
            $this->first_day_weekDay=($this->today)->getDayOfWeek();
            $this->initialize_calendar($this->year,$this->month);                        

    }
    //مقدار دهی اولیه روز های هر ماه
    public function initialize_calendar($year,$month){
        try{
            
            $obj=new Jalalian($year,$month,1);
            $num_day_of_mounth=$obj->getMonthDays();
            $result=array();
            $array_of_timestamp=array();
            $istoday=null;
         for($i=1;$i<=$num_day_of_mounth;$i++){
             
             $new_obj_day=(new Jalalian($year,$month,$i));            
             $new_obj_day->isToday()?$istoday=true:$istoday=false;
             $timestamp=$new_obj_day->getTimestamp();
             $day_of_week=$new_obj_day->getDayOfWeek();            
             if($i==1){
                $isFirstDayOfMonth=true;
                $start_timestamp_array=['start_timestamp'=>$timestamp];
                $DayOfWeek_array=['DayOfWeek'=>$day_of_week];
                $num_day_of_mounth_array=['num_day_of_mounth'=>$num_day_of_mounth];
             }else{
                $isFirstDayOfMonth=false;
             }
             
             if($i==$num_day_of_mounth){
                   $end_timestamp_array=['end_timestamp'=>$timestamp];
                   $befor_month=0; 
                   if($month==1){
                        $befor_month=12;                      
                    }else{
                        $befor_month=$month;
                        $befor_month-=1;
                        
                }
                
                   $befor_month_obj=(new Jalalian($year,$befor_month,1));
                   $befor_month_num_day=$befor_month_obj->getMonthDays();   
                   $befor_month_num_day_array=['befor_month_num_day'=>$befor_month_num_day];
                   
             }
               
            $day_of_week=match($day_of_week){
                0=>'شنبه',
                1=>'یکشنبه',
                2=>'دوشنبه',
                3=>'سه شنبه',
                4=>'چهارشنبه',
                5=>'پنجشنبه',
                6=>'جمعه',
                default=>'ناشناخته',
            };
            array_push($array_of_timestamp,$timestamp);
            
            $day=day::firstOrCreate(
                ['timestamp'=>$timestamp],
                    ['year'=>$year,'month'=>$month,'day'=>$i,'day_of_week'=>$day_of_week,'isFirstDayOfMonth'=>$isFirstDayOfMonth,'holiday'=>false,'description'=>'مقدار دهی نشده','istoday'=>$istoday]
            );
            
         }
         
         $result=array_merge($array_of_timestamp,$start_timestamp_array,$DayOfWeek_array,$num_day_of_mounth_array,$end_timestamp_array,$befor_month_num_day_array);
                  
         return $result;
        }catch(Exception $e){
           dd($e->getMessage());
        }         
    }

    public function is_today($year,$month,$day){  
        // dd(typeOf($year));                
        $date = new Jalalian($year,$month,$day);
        
        $isToday=$date->isToday();                
        return($isToday?true:false);
        
    }

    public function getToday(){
        return $this->today;

    }

    public function get_info_day($timestamp){
        $info=day::where('timestamp',$timestamp)->get();        
        return $info->first();
    }

    // public function set_event($timestamp,$name_event,$description_event,$description){
        
    //     try{
            
       
    //         $day=day::where('timestamp',$timestamp)->update([
    //             'event'=>1,
    //             'event_name'=>$name_event,
    //             'event_description'=>$description_event,
    //             'description'=>$description,
    //         ]);
            
    //      redirect(route('calendarAdmin')) ; 
    //     }catch(Exception $e){
    //         dd($e->getMessage());
    //     }
        
    // }






};


?>

