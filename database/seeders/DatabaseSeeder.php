<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Models\Match;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $users = 28;
        User::factory($users)->create([
            'password' => Hash::make(env("CAPIBRR_USER_DEFAULT_PASSWD", ""))
        ]);

        User::factory()->create([
            'email' => 'karol.saj0@gmail.com',
            'password' => Hash::make(env("CAPIBRR_ADMIN_DEFAULT_PASSWD", "")),
            'role' => 'admin'
        ]);
        Interest::factory(5)->create();
        UserInfo::factory($users+1)->create();

        //Manualy adding matches because of two columns being unique



        Match::factory()->create([
            'user_one_id' => 3,
            'user_two_id' => 5
        ]);
        Match::factory()->create([
            'user_one_id' => 3,
            'user_two_id' => 10,
            'has_user_one_liked' => true,
            'has_user_two_liked' => true,
        ]);
        Match::factory()->create([
            'user_one_id' => 8,
            'user_two_id' => 3
        ]);
        Match::factory()->create([
            'user_one_id' => 5,
            'user_two_id' => 4
        ]);
        Match::factory()->create([
            'user_one_id' => 2,
            'user_two_id' => 3
        ]);



        for ($i = 0; $i < $users; $i++) {
            for ($j = 0; $j < 3; $j++) {
                UserInterest::factory()->create(["user_id" => $i + 1, "interest_id" => $j+1 ]);
            }
        }
    }
}
