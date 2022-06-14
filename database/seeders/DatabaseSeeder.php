<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Register;
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
        \App\Models\User::factory(10)->create()->each(function ($user) {
            $agents_count = rand(0, 20);
            $agents = Agent::factory($agents_count)->create([
                'user_id' => $user->id,
            ]);

            $registers_count = rand(0, 20);
            $registers = Register::factory($registers_count)->create([
                'user_id' => $user->id,
            ]);

            foreach ($registers as $register)
            {
                $rand = rand(1, $agents_count);
                $agents = $agents->random($rand);

                foreach ($agents as $agent) {
                    DB::table('agent_register')
                        ->insert([
                            'agent_id' => $agent->id,
                            'register_id' => $register->id,
                        ]);
                }
            };
        });
    }
}
