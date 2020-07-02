<?php

namespace Tests\Concerns;

use App\Contact;
use App\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Contracts\Console\Kernel;

trait SeedsSites
{
    public function user()
    {
        factory(User::class)->create(['email' => 'admin@admin.com']);

        return $this;
    }

    public function mainSite()
    {
        $faker = app(Generator::class);


        $contact = factory(Contact::class,10)->create([
            'user_id' => 1
        ]);


        return $this;
    }
}
