<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const USER_ADMIN = 1;
    const USER_CUSTOMER = 2;
    const USER_SALES_ASSISTANT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role_id',
        'activated',
        'avatar',
        'phone',
        'email_verified_at'
    ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }

    public function isAdmin()
    {
        if($this->role_id == self::USER_ADMIN)
            return true;

        return false;
    }

    public function isCustomer()
    {
        if($this->role_id == self::USER_CUSTOMER)
            return true;

        return false;
    }

    public function isSalesAssistant()
    {
        if($this->role_id == self::USER_SALES_ASSISTANT)
            return true;

        return false;
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
