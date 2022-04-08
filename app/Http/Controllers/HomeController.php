<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::all();
        $product = Product::all();
        $category = Category::all();

        $roleadmin = Role::where('id', 1)->first();
        $rolecustomers = Role::where('id', 2)->first();
        $users = $roleadmin->users;
        $customers = $rolecustomers->users;
        $customers_total = count( $customers);
        $users_total = count( $users);
        $categories_total = count($category);
        $products_total = count($product);
        $orders_total = count($orders);

        //monthly orders
        $janorders = Order::whereMonth('created_at', '1')->whereYear('created_at', '2022')->get()->count();
        $feborders = Order::whereMonth('created_at', '2')->whereYear('created_at', '2022')->get()->count();
        $marorders = Order::whereMonth('created_at', '3')->whereYear('created_at', '2022')->get()->count();
        $aprilorders = Order::whereMonth('created_at', '4')->whereYear('created_at', '2022')->get()->count();
        $mayorders = Order::whereMonth('created_at', '5')->whereYear('created_at', '2022')->get()->count();
        $junorders = Order::whereMonth('created_at', '6')->whereYear('created_at', '2022')->get()->count();
        $julyorders = Order::whereMonth('created_at', '7')->whereYear('created_at', '2022')->get()->count();
        $augorders = Order::whereMonth('created_at', '8')->whereYear('created_at', '2022')->get()->count();
        $septorders = Order::whereMonth('created_at', '9')->whereYear('created_at', '2022')->get()->count();
        $octorders = Order::whereMonth('created_at', '10')->whereYear('created_at', '2022')->get()->count();
        $novorders = Order::whereMonth('created_at', '11')->whereYear('created_at', '2022')->get()->count();
        $decorders = Order::whereMonth('created_at', '12')->whereYear('created_at', '2022')->get()->count();

        $from = date('01-01-2022');
        $to = date('d-m-y');
        $ordersavailable = Order::whereBetween('created_at', [$from, $to])->get();
       $montharr = [];
       foreach($ordersavailable as $date){
         $month = $date->created_at->format('M');
         array_push($montharr, $month);
       }
       $uniquemonth = array_unique($montharr);
       $monthname = "";
       foreach($uniquemonth as $monthname){
           $monthname =  $monthname;
       }
        
//dd($montharr);
        return view('home', compact('uniquemonth','monthname','orders_total', 'products_total', 'users_total',  'janorders', 'feborders', 'marorders', 'aprilorders', 'mayorders', 'junorders', 'julyorders',
        'augorders', 'septorders', 'octorders', 'novorders', 'decorders','customers_total', 'categories_total'));
    }
}
