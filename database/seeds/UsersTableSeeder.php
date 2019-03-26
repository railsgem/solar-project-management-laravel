<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => \Illuminate\Support\Str::random(10),
            'email' =>'admin@example.com',
            'password' => bcrypt('secret'),
        ]);
        factory(App\User::class, 2)->create();
    }
}
