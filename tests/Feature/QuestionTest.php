<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Answer;
use App\Models\User;
use App\Models\Question;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_question_can_be_created()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserExample',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'user@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test Street',
            'password' => bcrypt('password'),
        ]);

        $question = Question::create([
            'title' => 'Sample Question Title',
            'description' => 'This is a sample question description.',
            'creation_date' => now(),
            'owner_id' => $user->id
        ]);

        $this->assertDatabaseHas('questions', [
            'id' => $question->id
        ]);
    }

    /** @test */
    public function a_question_can_be_updated()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserExample',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'user@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test Street',
            'password' => bcrypt('password'),
        ]);

        $question = Question::create([
            'title' => 'Sample Question Title',
            'description' => 'This is a sample question description.',
            'creation_date' => now(),
            'owner_id' => $user->id
        ]);

        $question->title = 'Updated Question Title';
        $question->save();

        $this->assertDatabaseHas('questions', [
            'title' => 'Updated Question Title'
        ]);
    }

    /** @test */
    public function a_question_can_be_deleted()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserExample',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'user@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test Street',
            'password' => bcrypt('password'),
        ]);

        $question = Question::create([
            'title' => 'Sample Question Title',
            'description' => 'This is a sample question description.',
            'creation_date' => now(),
            'owner_id' => $user->id
        ]);

        $question_id = $question->id;
        $question->delete();

        $this->assertDatabaseMissing('questions', [
            'id' => $question_id
        ]);
    }

    /** @test */
    public function a_question_belongs_to_a_user()
    {
        $user = User::create([
            'is_botanist' => false,
            'creation_date' => now(),
            'botanist_since' => null,
            'pseudo' => 'UserExample',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '1234567890',
            'email' => 'user@example.com',
            'birth_date' => '1990-01-01',
            'url_picture' => null,
            'zip_code' => '12345',
            'city' => 'Test City',
            'address' => '123 Test Street',
            'password' => bcrypt('password'),
        ]);

        $question = Question::create([
            'title' => 'Sample Question Title',
            'description' => 'This is a sample question description.',
            'creation_date' => now(),
            'owner_id' => $user->id
        ]);

        $this->assertEquals($user->id, $question->owner->id);
    }
    public function test_can_create_many_Advices()
    {
        $initialCount = Question::count();

        Question::factory()->count(500)->create();

        $newCount = Question::count();
        $this->assertEquals($initialCount + 500, $newCount);
    }
}
