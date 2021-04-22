<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'invoice_id',
        'quantity'
    ];
    public $timestamps = false;
    protected $primaryKey = ['product_id','invoice_id'];
    public $incrementing = false;
}
