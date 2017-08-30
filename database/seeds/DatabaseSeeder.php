<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        User::truncate();
        Todo::truncate();

        factory(App\User::class, 10)->create();
        factory(App\Todo::class, 50)->create();

        // Enable it back
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
