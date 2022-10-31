<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Search;
use App\Models\calendarEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Livewire\Livewire;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Search::class);

        $component->assertStatus(200);
    }

    public function testgetEventTitle(){
         
        calendarEvent::factory()->create();
        $info = calendarEvent::get()->first();
        $title = $info->event;
        $component = Livewire::test(Search::class);
        $component->set('wordSearch',$title);
                
        $component->get('wordSearch');    
        $component->call('search');
        
        $component->assertViewHas('events');
        
        
    }
}
