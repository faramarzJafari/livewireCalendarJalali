<?php

namespace fara\livewirecalendarjalali;

use fara\livewirecalendarjalali\class\infodate\facade\infodate;
use Livewire\Component;

class Sidebar extends Component
{
    public  function set_holiday_week($day){
        infodate::setHolidayWeek($this->year,$this->month,$day);
    }

    public function render()
    {
        return view('livewire.sidebar')->layout('layouts.app');
    }
}
