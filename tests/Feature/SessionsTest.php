<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_a_session_can_be_created()
    {
        $session = \App\Models\Session::factory()->create();

        $this->assertDatabaseHas('sessions', [
            'id' => $session->id,
        ]);
    }

    public function test_a_session_can_be_updated()
    {
        $session = \App\Models\Session::factory()->create();
        $newNote = 'Updated note';
        $session->update(['note' => $newNote]);

        $this->assertDatabaseHas('sessions', [
            'id' => $session->id,
            'note' => $newNote
        ]);
    }

    public function test_a_session_can_be_deleted()
    {
        $session = \App\Models\Session::factory()->create();
        $sessionId = $session->id;
        $session->delete();

        $this->assertDatabaseMissing('sessions', [
            'id' => $sessionId
        ]);
    }

    public function test_a_session_belongs_to_an_owner()
    {
        $session = \App\Models\Session::factory()->create();
        $this->assertInstanceOf(\App\Models\User::class, $session->owner);
    }

    public function test_a_session_belongs_to_a_mission()
    {
        $session = \App\Models\Session::factory()->create();
        $this->assertInstanceOf(\App\Models\Mission::class, $session->mission);
    }
}
