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
        $user = App\User::where('email', 'demo@test.com')->first();
        if (is_null($user)) {
            App\User::create([
                'name' => 'demo',
                'email' => 'demo@test.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
