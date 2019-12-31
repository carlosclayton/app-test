<?php

namespace AppTest\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * AppTest\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $role
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AppTest\Models\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AppTest\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AppTest\Models\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AppTest\Models\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    const ROLE_ADMIN = 1;
    const ROLE_CLIENT = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
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
