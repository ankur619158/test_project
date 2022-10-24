<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use faker\Factory as faker;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); 
        for($i=1;$i<50;$i++){
            $user = new User;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = bcrypt($faker->password);
            $user->status = "pending";
            $user->save();
        }
    }
}
