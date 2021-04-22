@component('mail::message')
# Thank you!

Thank you for purchasing from our store. Below is your receipt and link to track your shipping.
@component('mail::table')

|Product  |QTY  |Price   |
|---------|-----|--------|
@foreach($invoice_details as $item)
|{{$item->name}} |{{$item->quantity}}    |   {{$item->price}}|
@endforeach
|&nbsp;   |Total|{{$invoice->total_price}}|



@endcomponent

<p><i class="fas fa-file-alt"></i><b>ID : </b>{{$invoice->id}}</p>
<p><i class="fas fa-user-alt"></i><b>Customer : </b>{{$invoice->customer_name}}</p>
<p><i class="fas fa-phone-square-alt"></i><b>Telephone number : </b>{{$invoice->tel}}</p>
<p><i class="fas fa-map-marker-alt"></i><b>Address: </b>{{$invoice->address}}</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/Invoices/', 'color' => 'blue'])
Track you shipping
@endcomponent

Regards,<br>

{{ config('app.name') }}
@endcomponent
