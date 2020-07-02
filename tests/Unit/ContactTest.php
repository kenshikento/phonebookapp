<?php

namespace Tests\Unit;

use App\Contact;
use App\User;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Tests\Concerns\SeedsSites;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use SeedsSites, DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->artisan('db:seed');
    }

    /**
     * Test Contact store
     * @return void
     */    
    public function testUpdateContactAssertValiationTrue()
    {   
        Passport::actingAs(
            factory(User::class)->create()
        );

        $contact = factory(Contact::class)->make()->toArray();
        $response = $this->postJson('/api/contact', $contact);    
        $response->assertStatus(200);
    }

    public function testUpdateContactAssertValidationFalse()
    {
        Passport::actingAs(
            factory(User::class)->create()
        );

        $response = $this->postJson('/api/contact', ['name' => 'whateva']);    
        $response->assertStatus(422);
    }
}
