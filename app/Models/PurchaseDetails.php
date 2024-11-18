<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PurchaseDetails extends Model
{
    use HasFactory;

    protected $fillable = [

    
        'date',
        'delivery_date',
        'po_number',
        'terms_of_payment',
        'company',
        'department',
        'supplier',
        'grandtotal',
        'subtotal',
        'grandtotal'
        
       
        

    ];
     
      // One-to-Many relationship with PurchaseItem model
      public function items()
      {
          return $this->hasMany(PurchaseItems::class, 'purchase_details_id');
      }
  
      public function supplier()
      {
          return $this->belongsTo(Supplier::class, 'supplier_name', 'id');
      }
      public function user()
    {
        return $this->belongsTo(User::class,'name','id' );
    }
}
