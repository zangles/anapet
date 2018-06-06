<?php

use App\User;
use Illuminate\Database\Seeder;

class adminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'zangles',
            'email' => 'azuresky07@gmail.com',
            'password' => \Hash::make('septiembre08')
        ]);
        factory(User::class)->create([
            'name' => 'anako',
            'email' => 'anako@gmail.com',
            'password' => \Hash::make('anako')
        ]);
    }
}
