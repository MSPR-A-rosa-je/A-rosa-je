<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Answer;
use App\Models\User;
use App\Models\Question;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $question;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->count(100)->create();
        Question::factory()->count(100)->create();
    }
    /** @test */
    public function an_answer_can_be_created()
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

        $answer = Answer::create([
            'like_number' => 0,
            'question_id' => $question->id,
            'description' => 'This is an answer.',
            'owner_id' => $user->id
        ]);

        $this->assertDatabaseHas('answers', [
            'id' => $answer->id
        ]);
    }

    /** @test */
    public function an_answer_can_be_updated()
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

        $answer = Answer::create([
            'like_number' => 0,
            'question_id' => $question->id,
            'description' => 'This is an answer.',
            'owner_id' => $user->id
        ]);

        $answer->like_number = 5;
        $answer->save();

        $this->assertDatabaseHas('answers', [
            'like_number' => 5
        ]);
    }

    /** @test */
    public function an_answer_can_be_deleted()
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

        $answer = Answer::create([
            'like_number' => 0,
            'question_id' => $question->id,
            'description' => 'This is an answer.',
            'owner_id' => $user->id
        ]);

        $answer_id = $answer->id;
        $answer->delete();

        $this->assertDatabaseMissing('answers', [
            'id' => $answer_id
        ]);
    }

    /** @test */
    public function an_answer_belongs_to_a_question_and_a_user()
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

        $answer = Answer::create([
            'like_number' => 0,
            'question_id' => $question->id,
            'description' => 'This is an answer.',
            'owner_id' => $user->id
        ]);

        $this->assertEquals($user->id, $answer->owner->id);
        $this->assertEquals($question->id, $answer->question->id);
    }
    public function test_can_create_many_answers()
    {
        $initialCount = Answer::count();

        Answer::factory()->count(500)->create();

        $newCount = Answer::count();
        $this->assertEquals($initialCount + 500, $newCount);
    }
}
