<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Address;
use App\Models\User;

class AddressesTest extends TestCase
{
    use RefreshDatabase;
    public function test_an_address_can_be_created()
    {
        $address = Address::factory()->create();

        $this->assertDatabaseHas('addresses', [
            'id' => $address->id
        ]);
    }

    public function test_an_address_can_be_updated()
    {
        $address = Address::factory()->create();
        $address->update(['city' => 'New City']);

        $this->assertDatabaseHas('addresses', [
            'id' => $address->id,
            'city' => 'New City'
        ]);
    }

    public function test_an_address_can_be_deleted()
    {
        $address = Address::factory()->create();
        $addressId = $address->id;
        $address->delete();

        $this->assertDatabaseMissing('addresses', [
            'id' => $addressId
        ]);
    }

    public function test_a_address_belongs_to_an_user()
    {
        $address = Address::factory()->create();
        $this->assertInstanceOf(User::class, $address->user);
    }
    public function test_an_address_can_be_created_for_a_user()
    {
        $address = Address::factory()->for(User::factory())->create();

        $this->assertDatabaseHas('addresses', [
            'id' => $address->id,
            'user_id' => $address->user_id
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $address->user_id
        ]);
    }

    public function test_can_create_many_addresses()
    {
        $initialCount = Address::count();

        Address::factory()->count(50)->create();

        $newCount = Address::count();
        $this->assertEquals($initialCount + 50, $newCount);
    }
}
