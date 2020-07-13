<?php

namespace Modules\User\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Modules\User\Entities\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Entities\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
