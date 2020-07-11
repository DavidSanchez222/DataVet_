<?php

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
        // $this->call(UserSeeder::class);
        factory(App\Models\DocumentType::class, 3)->create();
        factory(App\Models\User::class, 3)->create();
        factory(App\Models\Role::class, 3)->create();
    }
}
