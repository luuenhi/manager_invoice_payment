<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'invoice_code',
        'invoice_date',
        'point_used',
        'price_total',
        'customer_id',
        'cashier_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'invoice_date',
        'created_at',
        'updated_at',
    ];

    /**
     * get customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * get cashier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }
 
    /**
     * Relationship hasMany with InvoiceDetails
     */
    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
