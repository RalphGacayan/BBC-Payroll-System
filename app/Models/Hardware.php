<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $table = 'hardwares';

    protected $fillable = [
 
        'no',
        'date',
        'unit',
        'asset_name',
        'model',
        'image',
        'serial_number',
        'status',
        'company',
        'manufacturer',
        'remarks',
        'assigned_to',
        'created_by'

    ];
}
