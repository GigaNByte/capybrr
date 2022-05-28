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

        $users = 10;
        User::factory($users)->create([
            'password' => Hash::make(env("CAPIBRR_USER_DEFAULT_PASSWD", ""))
        ]);

        User::factory()->create([
            'email' => 'karol.saj0@gmail.com',
            'password' => Hash::make(env("CAPIBRR_ADMIN_DEFAULT_PASSWD", "")),
            'role' => 'admin'
        ]);
        Interest::factory(5)->create();
        UserInfo::factory($users)->create();

        //Manualy adding matches because of two columns being unique

        for ($i = 1; $i < 5; $i++) {
            Match::factory()->create([
                'user_one_id' => $i,
                'user_two_id' => $users-$i
            ]);
        }
        Match::factory()->create([
            'user_one_id' => 3,
            'user_two_id' => 5
        ]);
        Match::factory()->create([
            'user_one_id' => 3,
            'user_two_id' => 9
        ]);
        Match::factory()->create([
            'user_one_id' => 3,
            'user_two_id' => 1
        ]);

        for ($i = 0; $i < $users; $i++) {
            for ($j = 0; $j < 3; $j++) {
                UserInterest::factory()->create(["user_id" => $i + 1]);
            }
        }
    }
}
