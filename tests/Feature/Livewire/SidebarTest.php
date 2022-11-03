<?php

namespace Tests\Feature\Livewire;

use fara\livewirecalendarjalali\Sidebar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SidebarTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Sidebar::class);

        $component->assertStatus(200);
    }
}
