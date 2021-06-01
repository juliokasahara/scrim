<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create(10)->each(function($contact) {
        //    $contact->addresses()->save(\App\Models\Group::factory(3)->make());
        // });
        
    }
}
