<?php

namespace App\Models;

use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail,Wallet
{
    use HasFactory, Notifiable;
    use HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'country',
        'phone',
        'address_1',
        'address_2',
        'post_code',
        'city',
        'state',
        'business_name',
        'business_tax_id',
        'business_contact_number',
        'nic',
        'agree',
        'email',
        'password',
        'google_id',
        'github_id',
        'dba',
        'b_address_1',
        'b_address_2',
        'id1',
        'id2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
