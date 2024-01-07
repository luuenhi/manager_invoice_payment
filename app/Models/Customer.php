<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'cus_name',
        'phone',
        'address',
        'dateofbirth',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'dateofbirth',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the loyaltyCard associated with the Customer.
     */
    public function loyaltyCard()
    {
        return $this->hasOne(LoyaltyCard::class);
    }
}
