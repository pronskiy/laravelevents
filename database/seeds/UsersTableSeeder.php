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
        factory(App\Item::class, 50)->create();
        factory(App\User::class, 1)->states('eric')->create();
    }
}
