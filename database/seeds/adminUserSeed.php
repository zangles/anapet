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
            'name' => 'Anako',
            'email' => 'anabelw@gmail.com',
            'password' => \Hash::make('p1xk3n')
        ]);
        factory(User::class)->create([
            'name' => 'Kendolf',
            'email' => 'werekendolf@gmail.com',
            'password' => \Hash::make('p1xk3n')
        ]);
    }
}
