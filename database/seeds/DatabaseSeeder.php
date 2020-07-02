<?php

use Illuminate\Database\Seeder;
use Tests\Concerns\SeedsSites;

class DatabaseSeeder extends Seeder
{
	use SeedsSites;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->command->getOutput()->writeln("<info>Seeding:</info> Users");
        $this->user();
        $this->command->getOutput()->writeln("<info>Seeding:</info> Main Site");
        $this->mainSite();
    }
}
