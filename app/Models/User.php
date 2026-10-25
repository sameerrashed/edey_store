<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
        'role_id',
        'phone',
        'city',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(role::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }

    public function requestUpgradeMerchant()
    {
        return $this->belongsTo(requestUpgradeMerchant::class);
    }

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'first_name',
            'type' => 'text',
            'label' => 'الإسم الأول',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'last_name',
            'type' => 'text',
            'label' => 'الإسم الثاني',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'الإيميل',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'password',
            'type' => 'password',
            'label' => 'كلمة المرور',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'phone',
            'type' => 'text',
            'label' => 'رقم التواصل',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'city',
            'type' => 'text',
            'label' => 'المدينة',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'image',
            'type' => 'file',
            'label' => 'الصورة الشخصية',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }
}
