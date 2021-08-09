<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'customers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customers_id',
        'customers_firstname',
        'customers_lastname',
        'customers_email_address',
        'customers_dob',
        'social_media_id',
        'customers_telephone',
        'customers_nick',
        'customers_fax',
        'customers_newsletter',
        'customers_email_format',
        'customers_default_address_id',
        'customers_password',
        'customers_authorization',
        'language_id',
        'language_code',
        'customer_country_id',
        'hear_us',
        'customer_other_content',
        'http_user_agent',
        'user_ip_address',
        'customers_regist_from',
        'member_level',
        'from_where',
        'customers_company',
        'tax_number',
        'customers_info_date_account_created',
        'source',
        'test_mailbox',
        'email_is_active',
        'customer_photo',
        'area'
    ];

    public $timestamps = false;

    protected $primaryKey = 'customers_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'customers_password'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->attributes['customers_password'];
        //return $this->customers_password;   //或其它名称，以上两种写法都OK
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
