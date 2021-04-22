<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class reservationsController extends Controller
{
    //
    function show(){
        return view('reservations.show');
    }
    function store(Request $request){
        $request -> validate([
            'fullname' => ['required', 'string', 'max:255'],
            'numofCustomer' => ['required', 'numeric', 'max:45','min:1'],
            'phone' => 'required|regex:/^0[0-9]{9,10}+$/',
            'date' => ['required','date'],
            'hour' => ['required','numeric','min:10','max:22'],
        ]);
        $user_id = Auth::check()?Auth::user()->id : null;
        $notes = $request->get('note')?$request->get('note') : null;
        $status = 0;
        $minute = $request->get('minute')?$request->get('minute') : "00";
        $time = $request->get('hour').":".$minute;
        $reservation = Reservation::create([
            'date' => $request->get('date'),
            'time' => $time,
            'name' => $request->get('fullname'),
            'number_of_people' => $request->get('numofCustomer'),
            'tel' => $request->get('phone'),
            'notes' => $notes,
            'user_id' => $user_id,
            'status' => $status
        ]);
        return redirect()->route('reservation.show') ->with ('success','Đặt bàn thành công.Xin chờ để admin xác nhận !');
        
    }
}
