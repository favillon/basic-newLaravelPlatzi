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
        App\User::create([
            'name' => 'nombre',
            'email' => 'a@a.com',
            'password' => bcrypt('123456789')
        ]);

        factory(App\Post::class, 24)->create();
    }
}
