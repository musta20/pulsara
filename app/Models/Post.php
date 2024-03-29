<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Stage\Stage;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string @id
 * @property Stage $stage
 * @property string $content
 * @property string $group_id
 * @property string $profile_id
 * @property CarbonInterface $stage_updated_at
 * @property null|CarbonInterface $published_at
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Profile $profile
 * @property Group $group
 */
 
final class Post extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'stage',
        'content',
        'group_id',
        'profile_id',
        'stage_updated_at',
        'published_at'
    ];

    protected $casts = [
        'stage' => Stage::class,
        'stage_updated_at'=>'datetime',
        'published_at'=>'datetime'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(
            related:Group::class,
            foreignKey:'group_id'
        );

    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(
            related:Profile::class,
            foreignKey:'profile_id'
        );
    }




}
