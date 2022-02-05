<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PreUser
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PreUser extends Model
{
    use HasFactory;

    protected $guarded = [];
}
