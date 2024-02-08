<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory,SoftDeletes, InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'start_date',
        'end_date', 
        'budget',
        'partner_id',
        'status',
    ];

    public const STATUS_RADIO = [
        '1'=> 'Starting',
        '2'=> 'Ongoing',
        '3'=> 'Complete',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function projectUser():HasMany
    {
        return $this->hasMany(ProjectUser::class);
    }


}
