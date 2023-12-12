<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Plant;
use Database\Factories\PlantFactory;

class PlantTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_plant_can_be_created()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'johndoe@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $plant = Plant::create([
            'owner_id' => $user->id,
            'specie_name' => 'Rose',
            'location' => 'Garden',
            'url_photo' => null,
            'status' => 'Healthy',
            'description' => 'A beautiful red rose.'
        ]);

        $this->assertDatabaseHas('plants', [
            'specie_name' => 'Rose'
        ]);
    }

    /** @test */
    public function a_plant_can_be_updated()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'johndoe@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $plant = Plant::create([
            'owner_id' => $user->id,
            'specie_name' => 'Tulip',
            'location' => 'Balcony',
            'url_photo' => null,
            'status' => 'Healthy',
            'description' => 'A vibrant tulip.'
        ]);

        $plant->status = 'Needs Water';
        $plant->save();

        $this->assertDatabaseHas('plants', [
            'status' => 'Needs Water'
        ]);
    }

    /** @test */
    public function a_plant_can_be_deleted()
    {
        $user = User::create([
             'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'johndoe@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $plant = Plant::create([
            'owner_id' => $user->id,
            'specie_name' => 'Rose',
            'location' => 'Garden',
            'url_photo' => null,
            'status' => 'Healthy',
            'description' => 'A beautiful red rose.'
        ]);

        $plant_id = $plant->id;
        $plant->delete();

        $this->assertDatabaseMissing('plants', [
            'id' => $plant_id
        ]);
    }

    /** @test */
    public function a_plant_belongs_to_a_user()
    {
        $user = User::create([
             'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserTest',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'johndoe@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test St',
            'password' => bcrypt('password'),
        ]);

        $plant = Plant::create([
            'owner_id' => $user->id,
            'specie_name' => 'Rose',
            'location' => 'Garden',
            'url_photo' => null,
            'status' => 'Healthy',
            'description' => 'A beautiful red rose.'
        ]);

        $this->assertEquals($user->id, $plant->owner->id);
    }
    public function test_can_create_many_plants()
{
    $initialCount = Plant::count();

    Plant::factory()->count(10000)->create();

    $newCount = Plant::count();
    $this->assertEquals($initialCount + 10000, $newCount);
}
}
