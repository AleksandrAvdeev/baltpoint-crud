<?php

namespace App\Baltpoint\Models;

use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $user_id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Phone|null $phone
 */
class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'email',
    ];

    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class, 'user_id', 'user_id');
    }
}
