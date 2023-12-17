<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Session;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SessionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_session_can_be_created()
    {
        $session = Session::factory()->create();

        $this->assertDatabaseHas('sessions', [
            'id' => $session->id,
        ]);
    }

    public function test_a_session_can_be_updated()
    {
        $session = Session::factory()->create();
        $newNote = 'Updated note';
        $session->update(['note' => $newNote]);

        $this->assertDatabaseHas('sessions', [
            'id' => $session->id,
            'note' => $newNote
        ]);
    }

    public function test_a_session_can_be_deleted()
    {
        $session = Session::factory()->create();
        $sessionId = $session->id;
        $session->delete();

        $this->assertDatabaseMissing('sessions', [
            'id' => $sessionId
        ]);
    }

    public function test_a_session_belongs_to_an_owner()
    {
        $session = Session::factory()->create();
        $this->assertInstanceOf(User::class, $session->owner);
    }

    public function test_a_session_belongs_to_a_mission()
    {
        $session = Session::factory()->create();
        $this->assertInstanceOf(Mission::class, $session->mission);
    }

    public function test_can_create_many_sessions()
    {
        $initialCount = Session::count();

        Session::factory()->count(20)->create();

        $newCount = Session::count();
        $this->assertEquals($initialCount + 20, $newCount);
    }
}
