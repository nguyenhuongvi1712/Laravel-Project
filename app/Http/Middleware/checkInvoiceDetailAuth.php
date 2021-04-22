<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class checkInvoiceDetailAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $invoice = Invoice::find($request->id);
        if($invoice->user_id != Auth::user()->id)
            return redirect()-> route('invoices.show');
        return $next($request);
    }
}
