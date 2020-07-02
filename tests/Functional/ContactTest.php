<?php

namespace Tests\Functional;

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
     * Test get all contacts
     * @return void
     */
    public function testGetAllContacts() 
    { 
        $this->WithoutMiddleware();

        $response = $this->get('/api/contact/');
        $response->assertStatus(200);
    }

    /**
     * Test Contact store
     * @return void
     */    
    public function testUpdateContactAssertTrue()
    {   
        Passport::actingAs(
            factory(User::class)->create()
        );

        $contact = factory(Contact::class)->make()->toArray();
        $response = $this->postJson('/api/contact', $contact);    
        $this->assertDatabaseHas('contacts',$contact);
    }
}
