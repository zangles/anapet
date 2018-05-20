<?php

use App\Contact;
use App\Turn;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $contact[] = Contact::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'description' => $faker->paragraph(5)
            ]);
        }

        for ($i = 0; $i < 150; $i++) {

            $date = $faker->dateTimeBetween('-2 mouth', '+ 60 days')->format('Y-m-d H:i:s');

            $start = Carbon::createFromFormat('Y-m-d H:i:s', $date);
            $end = $start->addHours($faker->randomDigit());

            $turns[] = Turn::create([
                'contact_id' =>  Contact::orderBy(DB::raw('RAND()'))->get()->first()->id,
                'start' => $start,
                'end' => $end,
            ]);
        }

    }
}