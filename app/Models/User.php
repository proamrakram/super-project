<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'user_status',
        'user_type',
        'verification_code',
        'email_verified_at',
        'can_recieve_sms',
        'advertiser_number'
    ];

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
        'branches_ids' => 'array',
    ];

    public function permissions()
    {
        return $this->hasOne(Permission::class, 'user_id', 'id');
    }

    public function userSettings()
    {
        return $this->hasOne(UserSettings::class, 'user_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function orderEdits()
    {
        return $this->hasMany(OrderEditor::class, 'user_id', 'id');
    }

    public function orderNotes()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'users_branches', 'user_id', 'branch_id', 'id', 'id');
    }

    public function mediators()
    {
        return $this->hasMany(Mediator::class, 'user_id', 'id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'user_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id', 'id');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'user_status' => null,
            'user_type' => null,
            'branch_id' => null
        ], $filters);


        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('phone', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['user_type'] != null, function ($query) use ($filters) {
            $query->where('user_type', $filters['user_type']);
        });

        $builder->when($filters['search'] == '' && $filters['user_status'] != null, function ($query) use ($filters) {
            $query->where('user_status', $filters['user_status']);
        });

        $builder->when($filters['search'] == '' && $filters['branch_id'] != null, function ($query) use ($filters) {
            $query->whereHas('branches', function ($query) use ($filters) {
                $query->where('id', $filters['branch_id']);
            });
        });
    }



    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'phone',
            'email',
            'user_status',
            'user_type',
            'verification_code',
            'advertiser_number',
            'email_verified_at',
            'can_recieve_sms',
            'updated_at',
            'created_at',
        ]);
    }
}
