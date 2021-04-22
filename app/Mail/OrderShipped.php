<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $invoice;
    public function __construct(Invoice $invoice)
    {
        //
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice_details =  DB::table('invoice_details')
        ->join('products', 'products.id', '=', 'invoice_details.product_id')
        ->where('invoice_id',$this->invoice->id)
        ->select('invoice_details.*', 'products.image', 'products.price','products.name')
        ->get();
        return $this->markdown('emails.orders.shipped')->with(['invoice_details'=>$invoice_details]);
    }
}
