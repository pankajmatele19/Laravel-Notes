<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $url = url("/customer/regform");
        $title = "Customer Registration";
        $data = compact('url', 'title');
        return view('regform')->with($data);
    }

    // public function store(Request $request)
    // {
    // $request->validate(
    //     [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:customer',
    //         'password' => 'required',
    //         'password_confirm' => 'required|same:password'
    //     ]
    // );
    // echo "<pre>";
    // print_r($request->all());
    //     $customers = new Customer();
    //     $customers->name = $request['name'];
    //     $customers->email = $request['email'];
    //     $customers->gender = $request['gender'];
    //     $customers->password = $request['password'];

    //     $res = $customers->save();

    //     if($res) {
    //         return back()->with('success','Customer Registered Successfully!');
    //     }
    //     else {
    //         return back()->with('error','Customer Already Registered!');
    //     }
    // // }
    // }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    public function create(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'password_confirm' => 'required|same:password',
            ]
        );

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        return redirect('/customer/login');
    }


    public function view()
    {
        $user = auth()->user();
        $customer = Customer::all();

        $data = compact('customer', 'user');

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
            $data = compact('customer', 'title', 'url');
            return view('regform')->with($data);
        }
    }


    public function update(Request $request)
    {
        $id = $request['id'];
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = $request['password'];
        $customer->save();
        return redirect('/customer/view');
    }



    public function loginform()
    {
        return view('login');
    }


    public function login_user(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                // 'password_confirm' => 'required|same:password'
            ]
        );

        // echo "<pre>";
        // print_r($request->all());

        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $cust = User::where('email', $email)->first();
            Auth::login($cust);
            // return redirect('/customer/view');
            return response()->json(['success' => 'Login success!']);

        }
    }

    // dd("after if");

    // if ($cust->count() > 0) {
    //     $request->session()->put("user", $cust->first()->name);
    //     return redirect('/customer/view');
    // } else {
    //     return redirect('/customer/login');
    // }


    // Auth::attempt([email,pass])


    // true
    // $user = User::where('email',$email)->first()
    // Auth::login($user)
    // redirect (success)

    //false
    // redirect with errorsyy

    public function logout(Request $request)
    {
        $user = Auth::user();

        if (isset($user->name)) {

            Auth::logout();
        }
        return redirect('/customer/login');
    }

}
