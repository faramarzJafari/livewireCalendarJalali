<?php

namespace fara\livewirecalendarjalali;



use fara\livewirecalendarjalali\class\infodate\facade\infodate;
use fara\livewirecalendarjalali\Models\day;
use Livewire\Component;


class AddEvent extends Component
{
    

    public $name_input;
    public $description_event;
    public $description;
    public $timestamp;
    public $events;
    public $holiday_status;


    public function mount($timestamp){
        $this->timestamp=$timestamp;
        $this->holiday_status=day::where('timestamp',$this->timestamp)->first()->holiday;

    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    protected $rules=[
        'name_input'=>'required|max:12',
        'description_event'=>'required',
    ];

    protected $messages = [
        'name_input.required' => 'نام رویداد را باید وارد کنید',
        'name_input.max' => 'نام رویداد نباید بیشتر از 12 حرف باشد',
        'description_event.required'=>'درباره رویداد توضیح مناسبی بنویسید',
    ];

    public function add_event(){
           $validataData=$this->validate();        
           $result = infodate::addEvent($this->timestamp,$this->name_input,$this->description_event,true);
           $result?session()->flash('success','رویداد با موفقیت ایجاد شد'):session()->flash('danger','مشکلی پیش آمده');

            $this->render();
    }

    public function set_holiday_today(){
        $holiday=day::where('timestamp',$this->timestamp)->update(['holiday'=>!$this->holiday_status]);
        return redirect()->to('calendarAdmin');
  
    }

    public function get_events(){
        $this->events = infodate::getEvent($this->timestamp);
    }

    public function delete_event($id){    
        infodate::deleteEvent($id);
        session()->flash('success','رویداد با موفقیت حذف شد');
        $this->render();
    }

    public function delete_All_Events(){
        
        infodate::deleteAllEvents($this->timestamp);
    }

    public function render()
    {

        $this->get_events();
        return view('livewire.add-event')->layout('layouts.app');
    }
}
