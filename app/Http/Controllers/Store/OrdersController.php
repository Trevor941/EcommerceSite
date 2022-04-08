<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Http\Requests\BulkActionOrdersRequest;
use App\Http\Requests\CreateOrderValidateRequest;
use Carbon\Carbon;
class OrdersController extends Controller
{
  public function __construct()
  {
      // $this->middleware('auth');
      // $this->middleware('admin');
  }

    public function checkout(){
        return view('store.checkout');
    }

    public function createorder(CreateOrderValidateRequest $request){
        
         if($request->session()->has('cart')){
          $neworder = new Order();
          $neworder->orderno = 'P'.rand(100000, 999999);
          $neworder->cost = $request->session()->get('total');
          $neworder->firstname = $request->firstname;
          $neworder->lastname = $request->lastname;
          $neworder->email = $request->email;
          $neworder->orderstatuses_id = 2;
          $neworder->city = $request->city;
          $neworder->address = $request->address;
          $neworder->country = $request->country;
          $neworder->phone = $request->phone;
          $neworder->date = date('Y-m-d');
          $neworder->save();

          $cart = $request->session()->get('cart');
          $order_id = 0;
          $orderno = $neworder->orderno;
          foreach($cart as $id => $product){
            $product = $cart[$id];
            $product_id = $product['id'];
            $product_name = $product['name'];
            $product_price = $product['regularprice'];
            $product_quantity = $product['quantity'];
            $product_image = $product['featuredimage'];

            //updating product stock
            $locateproduct = Product::where('id', $product_id)->first();
           $newquantity = $locateproduct->quantity - $product_quantity;
            $locateproduct->stock = $newquantity;
            $locateproduct->quantity = $newquantity;
            $locateproduct->save();
            

            //creating order items
            $order_id = $neworder->id;
            $neworderitem = new OrderItem;
            $neworderitem->order_id = $neworder->id;
            $neworderitem->product_id = $product_id;
            $neworderitem->product_name = $product_name;
            $neworderitem->product_price = $product_price;
            $neworderitem->product_featuredimage = $product_image;
            $neworderitem->quantity = $product_quantity;
            $neworderitem->order_date = date('Y-m-d');
            $neworderitem->save();


          }
          $request->session()->put('order_id', $order_id);
          $request->session()->put('orderno', $orderno);
          if($request->paymenttype == "paypal"){
            return redirect()->route('payment');
            //return $orderno;
          }
          else{
            return redirect()->route('payfast');
          }
         
          
         }
    }  

    public function index(Request $request){

      $searchonhold = $request->query('on-hold');
      $searchprocessing = $request->query('processing');
      $searchcompleted = $request->query('completed');
      $searchcancelled = $request->query('cancelled');
      $searchrefunded = $request->query('refunded');
      $searchorders = $request->query('searchorders');
      $searchdate = $request->query('searchdate');
      $searchcustomername = $request->query('firstname');

      if($searchonhold){
        $orders = Order::where('orderstatuses_id', 2)->paginate(10);
      }
      else if($searchprocessing){
        $orders = Order::where('orderstatuses_id', 1)->paginate(10);
      }
      else if($searchcompleted){
        $orders = Order::where('orderstatuses_id', 3)->paginate(10);
      }
      else if($searchcancelled){
        $orders = Order::where('orderstatuses_id', 4)->paginate(10);
      }
      else if($searchrefunded){
        $orders = Order::where('orderstatuses_id', 5)->paginate(10);
      }
      else if($searchorders){
        $orders = Order::where('id', 'LIKE', "%{$searchorders}%")->paginate(22); 
      }
      else{
        $orders = Order::paginate(10);
      }

       $onhold = Order::where('orderstatuses_id', 2);
       $processing = Order::where('orderstatuses_id', 1);
       $completed = Order::where('orderstatuses_id', 3);
       $cancelled = Order::where('orderstatuses_id', 2);
       $refunded = Order::where('orderstatuses_id', 5);
       $orderstatuses = OrderStatus::all();
       $ordersearchdates = Order::all();
       $newdatecollection = [];
       foreach($ordersearchdates as $date){
         $newdate = $date->created_at->format('M Y');
         array_push($newdatecollection, $newdate);
       }
       $uniquedate = array_unique($newdatecollection);
      
       if($searchdate){
        $searchdatearr = explode(" ", $searchdate);
        $searchmonth = $searchdatearr[0];
        $searchyear = $searchdatearr[1];
          $orders = Order::whereMonth('created_at', Carbon::parse($searchmonth)->month)
                         ->whereYear('created_at', Carbon::parse($searchyear)->year)
                         ->paginate(10);
      }
     if($searchcustomername){
        $orders = Order::where('firstname', $searchcustomername)->paginate(10);
      }
     if($searchcustomername != null && $searchdate !=null){
      $orders = Order::whereMonth('created_at', Carbon::parse($searchmonth)->month)
      ->whereYear('created_at', Carbon::parse($searchyear)->year)
      ->where('firstname', $searchcustomername)->paginate(10);
      
     }
   
     return view('orders.index', compact(['orders','processing', 'orderstatuses', 'uniquedate', 'onhold','completed', 'cancelled', 'refunded' ]));
      
    }

    public function bulkactionsorders(BulkActionOrdersRequest $request){
      if($request->selectedaction === 'bin'){
          foreach($request->order_ids as $order_id){
            $order = Order::findOrFail($order_id)->delete();
          }
          return redirect(route('orders.index'))->with('success', 'Products deleted successfully');
      }
      else{
        foreach($request->order_ids as $order_id){
          $order = Order::findOrFail($order_id);
          $order->orderstatuses_id = $request->selectedaction;
          $order->save();
        }
        return redirect(route('orders.index'))->with('success', 'Orders status changed successfully');
      }
     
    }

    public function autocomplete(Request $request)
    {
      $datas = Order::select("firstname")->where("firstname", "LIKE", "%{$request->terms}%")
      ->pluck("firstname");
      //return $datas;
      return response()->json($datas);
    }

    


}
