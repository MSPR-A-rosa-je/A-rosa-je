<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mission;

class MissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_a_mission_can_be_created()
    {
        $mission = Mission::factory()->create();

        $this->assertDatabaseHas('missions', [
            'id' => $mission->id
        ]);
    }

    public function test_a_mission_can_be_updated()
    {
        $mission = Mission::factory()->create();
        $mission->update(['price' => 42]);

        $this->assertDatabaseHas('missions', [
            'id' => $mission->id,
            'price' => 42
        ]);
    }

    public function test_a_mission_can_be_deleted()
    {
        $mission = Mission::factory()->create();
        $missionId = $mission->id;
        $mission->delete();

        $this->assertDatabaseMissing('missions', [
            'id' => $missionId
        ]);
    }

    public function test_a_mission_belongs_to_an_owner_and_a_gardiens()
    {
        $mission = Mission::factory()->create();
        $this->assertInstanceOf(User::class, $mission->gardien);
        $this->assertInstanceOf(User::class, $mission->owner);
    }

    public function test_can_create_many_missions()
    {
        $initialCount = Mission::count();

        Mission::factory()->count(20)->create();

        $newCount = Mission::count();
        $this->assertEquals($initialCount + 20, $newCount);
    }
}
