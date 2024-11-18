<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';

    protected $fillable = [
 
        'no',
        'date',
        'unit',
        'item_name',
        'model',
        'image',
        'serial_number',
        'status',
        'company',
        'created_by'

    ];
   
}
