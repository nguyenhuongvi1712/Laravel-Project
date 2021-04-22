<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice_details;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'address',
        'tel',
        'notes',
        'created_dateTime',
        'completed_time',
        'status',
        'user_id',
        'voucher_id',
        'customer_name'
    ];
    public $timestamps = false;

    public function invoice_details(){
        return $this->hasMany(Invoice_details::class);
    }
}
