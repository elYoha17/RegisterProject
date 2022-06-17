<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected function getTitleAttribute()
    {
        return "Registre du {$this->date->format('d M Y')}";
    }

    public function agents(): BelongsToMany
    {
        return $this->belongsToMany(Agent::class);
    }

}
