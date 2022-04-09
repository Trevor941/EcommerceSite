<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function customerlogin()
    {
        return view('store.login');
    }
    

    public function myaccount()
    {
        return view('store.myaccount');
    }
    public function contact()
    {
        return view('store.contact');
    }

    public function allcustomers(){

        $customers = User::all();
        return view ('customers.index', compact('customers'));
    }

}
