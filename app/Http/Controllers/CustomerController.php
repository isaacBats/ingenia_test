<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct() {

        $this->middleware('auth');

    }

    public function add() {

        return view('user_add');
    }

    public function create (Request $req) {

        $inputs = [
            'name' => $req->input('name'),
            'surnames' => $req->input('surnames'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone'),
            'credit_card' => $req->input('card_number'),
        ];

        Validator::make($inputs, [
            'name' => 'required',
            'surnames' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'credit_card' => 'required|min:19',
        ], 
        [
            'required' => 'The :attribute is required.',
            'phone.min' => 'The phone number must be 10 digits with -',
            'credit_card.min' => 'The credit card must be 19 digits with -',
        ])->validate();

        Customer::create($inputs);

        return redirect()->route('home')->with('status', 'User successfully created');
    }
}
