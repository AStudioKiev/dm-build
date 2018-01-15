<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Dem',
            'email' => 'templer5173902@mail.ru',
            'password' => '$2y$10$63LsQMWB5rDZ4OThLG7OleHVBIzYLsqe4yciiq7ASsL/7uG608O5m'
        ]);
    }
}
