<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Advice;
use App\Models\User;

class AdviceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_an_advice_can_be_created()
    {
        $advice = Advice::factory()->create();

        $this->assertDatabaseHas('advices', [
            'id' => $advice->id
        ]);
    }

    public function test_an_advice_can_be_updated()
    {
        $advice = Advice::factory()->create();
        $advice->update(['title' => 'New title']);

        $this->assertDatabaseHas('advices', [
            'id' => $advice->id,
            'title' => 'New title'
        ]);
    }

    public function test_an_advice_can_be_deleted()
    {
        $advice = Advice::factory()->create();
        $adviceId = $advice->id;
        $advice->delete();

        $this->assertDatabaseMissing('advices', [
            'id' => $adviceId
        ]);
    }

    public function test_a_advice_belongs_to_an_user()
    {
        $advice = Advice::factory()->create();
        $this->assertInstanceOf(User::class, $advice->owner);
    }

    public function test_can_create_many_advices()
    {
        $initialCount = Advice::count();

        Advice::factory()->count(20)->create();

        $newCount = Advice::count();
        $this->assertEquals($initialCount + 20, $newCount);
    }
}
