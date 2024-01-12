<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function index()
    {
        $url = url("/customer/regform");
        $title = "Customer Registration";
        $data = compact('url','title');
        return view('regform')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirm' => 'required|same:password'
            ]
        );
        echo "<pre>";
        print_r($request->all());

        $customers = new Customer();
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->gender = $request['gender'];
        $customers->password = $request['password'];

        $customers->save();

        return redirect('/customer/view');
    }

    public function view()
    {

        $customer = Customer::all();

        $data = compact('customer');

        return view('customerview')->with($data);

    }

    public function delete($id)
    {
        Customer::find($id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        if (is_null($id)) {
            return redirect('/customer/view');
        } else {
            $url = url('/customer/update') . "/" . $id;
            $title = "Update Customer";
            $customer = Customer::find($id);
            $data = compact('customer','title','url');
            return view('regform')->with($data);
        }
    }
    public function update(Request $request) {
        $id = $request['id'];
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->password = $request['password'];
        $customer->save();
        return redirect('/customer/view');
    }

    public function loginform() {
        return view('login');
    }

    public function auth(Request $request) {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'password_confirm' => 'required|same:password'
            ]
        );
        // echo "<pre>";
        // print_r($request->all());

        $email = $request['email'];
        $password= $request['password'];
        $cust = Customer::where('email',$email)->where("password",$password)->first();
        if ($cust->count() > 0) {
            return redirect('/customer/view');
        }
        else {
            return redirect('/customer/login');
        }
    }

}
