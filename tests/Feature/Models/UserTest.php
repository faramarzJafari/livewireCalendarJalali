<?php

namespace Tests\Feature\Models;

use fara\livewirecalendarjalali\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testinsertData  ()
    {
        $data = User::factory()->make()->toArray();
        $data['password'] = 123456;
        User::create($data);
        
        $this->assertDatabaseCount('users',1);
    }
}
