<?php

namespace App\Models;

use App\Models\Register;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Agent extends Model
{
    use HasFactory;

    public function registers(): BelongsToMany
    {
        return $this->belongsToMany(Register::class);
    }
}
