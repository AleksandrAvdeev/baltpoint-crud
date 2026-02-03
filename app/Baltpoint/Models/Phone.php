<?php

namespace App\Baltpoint\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $phone_id
 * @property int $user_id
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 */
class Phone extends Model
{
    protected $table = 'phones';
    protected $primaryKey = 'phone_id';

    protected $fillable = [
        'phone_id',
        'user_id',
        'value',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
