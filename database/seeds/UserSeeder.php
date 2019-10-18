<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create(['email' => 'administrator@mail.com', 'name' => 'Administrator', 'password' => bcrypt('12345678'), 'admin' => true]);
        factory(User::class, 10)->create();
    }
}
