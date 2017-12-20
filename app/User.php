<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\UserEmailAddress;
use App\SharePurchase;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'password', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function emailAddresses ()
    {
        return $this->hasMany(UserEmailAddress::class);
    }

    public function sharePurchases ()
    {
        return $this->hasMany(SharePurchase::class);
    }

    public function addEmailAddress ($email, $is_default = false) {
        $this->emailAddresses()->create([
                                    'email_address' =>  $email,
                                    'is_default'    =>  $is_default
                                ]);
    }
}