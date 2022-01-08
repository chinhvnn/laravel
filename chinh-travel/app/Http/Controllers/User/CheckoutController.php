<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCheckout()
    {
        return view('user.checkout');
    }

    public function postCheckout(Request $request){
        $checkout = $request->all();  //or get(''),
        $hire_date =  floor((strtotime($checkout['end_date'])  - strtotime($checkout['start_date']))/86400);
        $price = DB::table('accomodation')->where('room_id', 1)->value('price');
        $totalPrice = $hire_date*$price;
        //dd($checkout);
        DB::table('orders')->insert([

            'user_id' => Auth::user()->id,
            'room_id' => $checkout['room_id'],
            'name2' => $checkout['name2'],
            'phone2' => $checkout['phone2'],
            'totalPrice' => $totalPrice,
            'date_start' => $checkout['start_date'],
            'date_end' => $checkout['end_date'],
            'note' => $checkout['note']

        ]);

        return view('user.checkout')->with('checkout', $checkout);
    }
}
