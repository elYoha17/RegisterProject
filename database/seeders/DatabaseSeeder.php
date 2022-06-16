<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Register;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@exemple.test',
        ]);

        $population = 50;

        $agents = Agent::factory()->count($population)->create([
            'user_id' => $user->id
        ]);
        $registers = Register::factory()->count(100)->create([
            'user_id' => $user->id
        ]);

        foreach ($registers as $register) {
            $rand_list = $agents->random(rand(0, $population));

            foreach ($rand_list as $agent) {
                    DB::table('agent_register')
                        ->insert([
                            'agent_id' => $agent->id,
                            'register_id' => $register->id,
                        ]);
            }
        }
    }
}
