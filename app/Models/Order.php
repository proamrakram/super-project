<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'order_status_id',
        'customer_id',
        'user_id',
        'offer_id',
        'customer_name',
        'customer_phone',
        'employer_name',
        'employee_type',
        'support_eskan',
        'property_type_id',
        'city_id',
        'area',
        'price_from',
        'price_to',
        'avaliable_amount',
        'purch_method_id',
        'desire_to_buy_id',
        'assign_to',
        'branch_id',
        'notes',
        'closed_date',
        'who_edit',
        'who_cancel',
        'who_add',
        'assign_to_date'
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'order_code',
            'order_status_id',
            'customer_id',
            'user_id',
            'offer_id',
            'customer_name',
            'customer_phone',
            'employer_name',
            'employee_type',
            'support_eskan',
            'property_type_id',
            'city_id',
            'area',
            'price_from',
            'price_to',
            'avaliable_amount',
            'purch_method_id',
            'desire_to_buy_id',
            'assign_to',
            'branch_id',
            'notes',
            'closed_date',
            'created_at',
            'who_edit',
            'who_cancel',
            'who_add',
            'assign_to_date'
        ]);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderEdits()
    {
        return $this->hasMany(OrderEditor::class, 'order_id', 'id');
    }

    public function orderNotes()
    {
        return $this->hasMany(OrderNote::class, 'order_id', 'id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function scopeOpenOrders($query, $user_id)
    {
        return $query->where('user_id', $user_id)->whereIn('order_status_id', [1, 4])->get();
    }

    public function scopeClosedOrders($query, $user_id)
    {
        return $query->where('user_id', $user_id)->whereIn('order_status_id', [3, 5])->get();
    }

    public function scopeCompleteOrders($query, $user_id)
    {
        return $query->where('user_id', $user_id)->where('order_status_id', 2)->get();
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'branch_type_id' => null,
            'property_type_id' => null,
            'order_status_id' => null,
            'city_id' => null,
            'date_from' => null,
            'date_to' => null,
        ], $filters);


        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->orWhere('customer_phone', 'like', '%' . $filters['search'] . '%')
                ->orWhere('order_code', 'like', '%' . $filters['search'] . '%')
                ->orWhere('customer_name', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['date_from'] && $filters['date_to'], function ($query) use ($filters) {
            $query->where('created_at', '>=', $filters['date_from'])
                ->where('created_at', '<=', $filters['date_to']);
        });

        // $builder->when($filters['search'] == '' && $filters['date'], function ($query) use ($filters) {
        //     $query->whereDate('created_at', '=', $filters['date']);
        // });

        $builder->when($filters['search'] == '' && $filters['order_status_id'], function ($query) use ($filters) {
            $query->where('order_status_id',  $filters['order_status_id']);
        });

        $builder->when($filters['search'] == '' && $filters['property_type_id'], function ($query) use ($filters) {
            $query->where('property_type_id',  $filters['property_type_id']);
        });


        $builder->when($filters['search'] == '' && $filters['city_id'], function ($query) use ($filters) {
            $query->where('city_id',  $filters['city_id']);
        });

        $builder->when($filters['search'] == '' && $filters['branch_type_id'], function ($query) use ($filters) {
            $query->where('branch_id',  $filters['branch_type_id']);
        });
    }
}
