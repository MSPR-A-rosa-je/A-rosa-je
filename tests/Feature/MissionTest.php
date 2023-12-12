<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Plant;
use App\Models\Mission;

class MissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_mission_can_be_created()
    {
        $owner = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'OwnerTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'owner@example.com',
            'birth_date' => '1980-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $botanist = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'BotanistTest',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'phone_number' => '0987654321',
            'email' => 'botanist@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $mission = Mission::create([
            'creation_date' => now(),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'owner_id' => $owner->id,
            'botanist_id' => $botanist->id,
            'candidates_list' => json_encode([]),
            'price' => 100.0,
            'description' => 'A mission description.'
        ]);

        $this->assertDatabaseHas('missions', [
            'id' => $mission->id
        ]);
    }

    /** @test */
    public function a_mission_can_be_updated()
    {
        $owner = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'OwnerTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'owner@example.com',
            'birth_date' => '1980-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $botanist = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'BotanistTest',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'phone_number' => '0987654321',
            'email' => 'botanist@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $mission = Mission::create([
            'creation_date' => now(),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'owner_id' => $owner->id,
            'botanist_id' => $botanist->id,
            'candidates_list' => json_encode([]),
            'price' => 100.0,
            'description' => 'A mission description.'
        ]);

        $mission->price = 150.0;
        $mission->save();

        $this->assertDatabaseHas('missions', [
            'price' => 150.0
        ]);
    }

    /** @test */
    public function a_mission_can_be_deleted()
    {
        $owner = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'OwnerTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'owner@example.com',
            'birth_date' => '1980-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $botanist = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'BotanistTest',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'phone_number' => '0987654321',
            'email' => 'botanist@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $mission = Mission::create([
            'creation_date' => now(),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'owner_id' => $owner->id,
            'botanist_id' => $botanist->id,
            'candidates_list' => json_encode([]),
            'price' => 100.0,
            'description' => 'A mission description.'
        ]);

        $mission_id = $mission->id;
        $mission->delete();

        $this->assertDatabaseMissing('missions', [
            'id' => $mission_id
        ]);
    }

    /** @test */
    public function a_mission_belongs_to_an_owner_and_a_botanist()
    {
        $owner = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'OwnerTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'owner@example.com',
            'birth_date' => '1980-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $botanist = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'BotanistTest',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'phone_number' => '0987654321',
            'email' => 'botanist@example.com',
            'birth_date' => '1985-02-02',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('password'),
        ]);

        $mission = Mission::create([
            'creation_date' => now(),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'owner_id' => $owner->id,
            'botanist_id' => $botanist->id,
            'candidates_list' => json_encode([]),
            'price' => 100.0,
            'description' => 'A mission description.'
        ]);

        $this->assertEquals($owner->id, $mission->owner->id);
        $this->assertEquals($botanist->id, $mission->botanist->id);
    }
    public function test_can_create_many_missions()
    {
        $initialCount = Mission::count();

        Mission::factory()->count(100)->create();

        $newCount = Mission::count();
        $this->assertEquals($initialCount + 100, $newCount);
    }

}
