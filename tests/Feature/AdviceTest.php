<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Advice;
use App\Models\User;

class AdviceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_advice_can_be_created()
    {
        $user = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'UserExample',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone_number' => '0987654321',
            'email' => 'jane@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $advice = Advice::create([
            'title' => 'Gardening Tips',
            'creation_date' => now(),
            'description' => 'Some useful gardening tips.',
            'owner_id' => $user->id,
            'like_number' => 0
        ]);

        $this->assertDatabaseHas('advices', [
            'id' => $advice->id
        ]);
    }

    /** @test */
    public function an_advice_can_be_updated()
    {
        $user = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'UserExample',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone_number' => '0987654321',
            'email' => 'jane@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $advice = Advice::create([
            'title' => 'Gardening Tips',
            'creation_date' => now(),
            'description' => 'Some useful gardening tips.',
            'owner_id' => $user->id,
            'like_number' => 0
        ]);

        $advice->like_number = 5;
        $advice->save();

        $this->assertDatabaseHas('advices', [
            'like_number' => 5
        ]);
    }

    /** @test */
    public function an_advice_can_be_deleted()
    {
        $user = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'UserExample',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone_number' => '0987654321',
            'email' => 'jane@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $advice = Advice::create([
            'title' => 'Gardening Tips',
            'creation_date' => now(),
            'description' => 'Some useful gardening tips.',
            'owner_id' => $user->id,
            'like_number' => 0
        ]);

        $advice_id = $advice->id;
        $advice->delete();

        $this->assertDatabaseMissing('advices', [
            'id' => $advice_id
        ]);
    }

    /** @test */
    public function an_advice_belongs_to_a_user()
    {
        $user = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'UserExample',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone_number' => '0987654321',
            'email' => 'jane@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $advice = Advice::create([
            'title' => 'Gardening Tips',
            'creation_date' => now(),
            'description' => 'Some useful gardening tips.',
            'owner_id' => $user->id,
            'like_number' => 0
        ]);

        $this->assertEquals($user->id, $advice->owner->id);
    }
    public function test_can_create_many_advices()
{
    $initialCount = Advice::count();

    Advice::factory()->count(500)->create();

    $newCount = Advice::count();
    $this->assertEquals($initialCount + 500, $newCount);
}
}
