<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Plant;

class PlantTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_a_plant_can_be_created()
    {
        $plant = Plant::factory()->create();

        $this->assertDatabaseHas('plants', [
            'id' => $plant->id
        ]);
    }

    public function test_a_plant_can_be_updated()
    {
        $plant = Plant::factory()->create();
        $plant->update(['description' => 'New description']);

        $this->assertDatabaseHas('plants', [
            'id' => $plant->id,
            'description' => 'New description'
        ]);
    }

    public function test_a_plant_can_be_deleted()
    {
        $plant = Plant::factory()->create();
        $plantId = $plant->id;
        $plant->delete();

        $this->assertDatabaseMissing('plants', [
            'id' => $plantId
        ]);
    }

    public function test_a_plant_belongs_to_an_user()
    {
        $plant = Plant::factory()->create();
        $this->assertInstanceOf(User::class, $plant->owner);
    }

    public function test_can_create_many_plants()
    {
        $initialCount = Plant::count();

        Plant::factory()->count(20)->create();

        $newCount = Plant::count();
        $this->assertEquals($initialCount + 20, $newCount);
    }
}
