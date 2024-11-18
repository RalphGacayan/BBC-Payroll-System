<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    use HasFactory;
    protected $fillable = [

        'item_description',
        'quantity',
        'price',
        'amount',
        'unit',
        'purchase_details_id',
    ];
    public function purchaseDetails()
    {
        return $this->belongsTo(PurchaseDetails::class, 'purchase_details_id');
    }
}
