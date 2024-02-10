<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Partner extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'type',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
