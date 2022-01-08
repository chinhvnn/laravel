<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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
    public function getListOrder()
    {
        $user_id = Auth::user()->id;
        $bills = DB::table('orders')
            ->where('user_id', '=', $user_id)
            ->paginate(5);
            //dd($bills);
            //->get();
        return view('user.list')->with('bills', $bills);
    }
}
// LengthAwarePaginator {#247 ▼
//     #total: 25
//     #lastPage: 5
//     #items: Collection {#235 ▶}
//     #perPage: 5
//     #currentPage: 1
//     #path: "http://127.0.0.1:8000/list-order"
//     #query: []
//     #fragment: null
//     #pageName: "page"
//   }