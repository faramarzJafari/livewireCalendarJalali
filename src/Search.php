<?php

namespace fara\livewirecalendarjalali;

use fara\livewirecalendarjalali\Models\calendarEvent;
use Livewire\Component;

class Search extends Component
{
    public $wordSearch;
    public $events =[];


    public function updatedWordsearch(){
        $this->search();
    }

    protected $rules = [
        'wordSearch' => 'min:6',
        
    ];


    public function search(){
        
        if($this->wordSearch && $this->wordSearch !='' && $this->wordSearch !=' ' ){
            $this->events = calendarEvent::where('event', 'like', '%'.$this->wordSearch.'%')->orWhere('description','like', '%'.$this->wordSearch.'%')->get();
              
        }else{
                    $this->events = null;
            }
        
    }

    public function render()
    {
       
        return view('livewire.search')->layout('layouts.app');
    }
}
