<?php

use App\Models\Agent;
use App\Models\Register;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_register', function (Blueprint $table) {
            $table->foreignIdFor(Agent::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Register::class)->constrained()->cascadeOnDelete();

            $table->primary(['agent_id', 'register_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_register');
    }
};
