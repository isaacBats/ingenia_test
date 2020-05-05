<?php
/**
  *-------------------------------------------------------------------------------------
  * Developer Information
  *-------------------------------------------------------------------------------------
  * @author Isaac Daniel Batista <daniel@danielbat.com>
  * @link https://danielbat.com Web Autor's site
  * @see https://twitter.com/codeisaac <@codeisaac>
  * @copyright 2020
  * @version 1.0.0
  * @package App\
  * Type: Controller
  * Description: Description
  *
  * For the full copyright and license information, please view the LICENSE
  * file that was distributed with this source code.
  */
        
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

        return view('customer_add');
    }

    protected function validator ($data) {
        
        return Validator::make($data, [
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
            ]);
    }

    public function create (Request $req) {

        $inputs = [
            'name' => $req->input('name'),
            'surnames' => $req->input('surnames'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone'),
            'credit_card' => $req->input('card_number'),
        ];

        $this->validator($inputs)->validate();

        Customer::create($inputs);

        return redirect()->route('home')->with('status', 'User successfully created');
    }

    public function edit(Request $req, $id) {

        $customer = Customer::find($id);
        return view('customer_edit', compact('customer'));
    }

    public function update(Request $req, $id) {
        $customer = Customer::find($id);
        $inputs = [
            'name' => $req->input('name'),
            'surnames' => $req->input('surnames'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone'),
            'credit_card' => $req->input('card_number'),
        ];
        $this->validator($inputs)->validate();
        $customer->name = $inputs['name'];
        $customer->surnames = $inputs['surnames'];
        $customer->email = $inputs['email'];
        $customer->phone = $inputs['phone'];
        $customer->credit_card = $inputs['credit_card'];

        $customer->save();

        return redirect()->route('home')->with('status', '¡User successfully updated!');
    }

    public function delete (Request $req, $id) {

        $customer = Customer::find($id);
        $customer->delete();
        $name = $customer->name;

        return redirect()->route('home')->with('status', "The user {$name} has been removed");
    }
}
