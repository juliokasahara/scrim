<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Group::factory(10)->create();
    }
}
