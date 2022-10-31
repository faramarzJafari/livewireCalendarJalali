<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Sidebar;
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
