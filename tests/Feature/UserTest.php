<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_created()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'TestUser',
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

        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com'
        ]);
    }

    /** @test */
    public function a_user_can_be_updated()
    {
        $user = User::create([
            'is_botanist' => true,
            'creation_date' => now(),
            'botanist_since' => now(),
            'pseudo' => 'OriginalUser',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'phone_number' => '0987654321',
            'email' => 'janesmith@example.com',
            'birth_date' => '1985-05-15',
            'url_picture' => null,
            'zip_code' => '54321',
            'city' => 'Another City',
            'address' => '321 Another St',
            'password' => bcrypt('anotherpassword'),
        ]);

        $user->pseudo = 'UpdatedUser';
        $user->save();

        $this->assertDatabaseHas('users', [
            'pseudo' => 'UpdatedUser'
        ]);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'ToDeleteUser',
            'first_name' => 'Mike',
            'last_name' => 'Johnson',
            'phone_number' => '5678901234',
            'email' => 'mikejohnson@example.com',
            'birth_date' => '1995-07-20',
            'url_picture' => null,
            'zip_code' => '67890',
            'city' => 'Yet Another City',
            'address' => '789 Yet Another St',
            'password' => bcrypt('yetanotherpassword'),
        ]);

        $user_id = $user->id;
        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $user_id
        ]);
    }
    public function test_can_create_many_users()
    {
        $initialCount = User::count();

        User::factory()->count(500)->create();

        $newCount = User::count();
        $this->assertEquals($initialCount + 500, $newCount);
    }
}
