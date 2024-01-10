<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    
    public function index() {
        return view('regform');
    }

    public function store(Request $request) {
        echo "<pre>";
        print_r($request->all());

        $customers = new Customer();
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->gender = $request['gender'];

        $customers->save();
    }
}
