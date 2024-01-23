<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string @id
 * 
 * @property string $handle
 * @property null|string $cover
 * @property null|string $country 
 * @property string user_id,
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property User $user
 */
 
final class Profile extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'handle',
        'cover',
        'user_id',
        'country'
    ];

    public function user(){
        return $this->belongsTo(
            related:User::class,
            foreignKey:'user_id'
        );
    }

    protected $casts = [];

}
