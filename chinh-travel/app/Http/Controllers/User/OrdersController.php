<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

//use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{   
    

    public function getOrder(){
            //dd(Auth::user());
      return view('user.orders');
    }
    
    public function getQuickOrder(Request $request){
        $orders = $request->all();  //or all() get(''),
        $note = $request->get('note');
        $note2 = $request->get('note2');
        $orders['note'] = $note.', '.$note2;

        return view('user.orders')->with('orders', $orders);  //gọi qua array $orders['']
    }
}
