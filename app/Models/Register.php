<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Register extends Model
{
    use HasFactory;

    public function agents(): BelongsToMany
    {
        return $this->belongsToMany(Agent::class);
    }
}
