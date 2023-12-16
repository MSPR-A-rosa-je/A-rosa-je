<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_a_user_can_be_created()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);
    }

    public function test_a_user_can_be_updated()
    {
        $user = User::factory()->create();
        $user->update(['pseudo' => 'New pseudo']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'pseudo' => 'New pseudo'
        ]);
    }

    public function test_a_user_can_be_deleted()
    {
        $user = User::factory()->create();
        $userId = $user->id;
        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $userId
        ]);
    }
    public function test_can_create_many_users()
    {
        $initialCount = User::count();

        User::factory()->count(100)->create();

        $newCount = User::count();
        $this->assertEquals($initialCount + 100, $newCount);
    }
}
