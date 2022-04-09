
<?php
/**
 * @param array $data
 * @param null $passPhrase
 * @return string
 */
function generateSignature($data, $passPhrase = null) {
    // Create parameter string
    $pfOutput = '';
    foreach( $data as $key => $val ) {
        if($val !== '') {
            $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        }
    }
    // Remove last ampersand
    $getString = substr( $pfOutput, 0, -1 );
    if( $passPhrase !== null ) {
        $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
    }
    return md5( $getString );
}

// Construct variables
$cartTotal = 1001.00;// This amount needs to be sourced from your application
$data = array(
    // Merchant details
    'merchant_id' => '10000100',
    'merchant_key' => '46f0cd694581a',
    'return_url' => 'https://www.ecommercesite.onlinewebdesigners.co.za/',
    'cancel_url' => 'http://www.yourdomain.co.za/cancel.php',
    'notify_url' => 'http://www.yourdomain.co.za/notify.php',
    // Buyer details
    'name_first' => 'First Name',
    'name_last'  => 'Last Name',
    'email_address'=> 'test@test.com',
    // Transaction details
    'm_payment_id' => '1234', //Unique payment ID to pass through to notify_url
    'amount' => number_format( sprintf( '%.2f', $cartTotal ), 2, '.', '' ),
    'item_name' => 'Order#123'
);

$signature = generateSignature($data);
$data['signature'] = $signature;

// If in testing mode make use of either sandbox.payfast.co.za or www.payfast.co.za
$testingMode = true;
$pfHost = $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
$htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post">';
foreach($data as $name=> $value)
{
    $htmlForm .= '<input name="'.$name.'" type="hidden" value=\''.$value.'\' />';
}
$htmlForm .= '<input type="submit" id="payfastbtn" value="PayFast" class="checkout-btn placeorder"/></form>';
 

?>

@extends('store.layouts.app')
@section('content')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Payment</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
     <hr>
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button>Apply Code</button>
                                    </div> --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Payfast</h1>
                                            @if(Session::has('total') && Session::get('total')  !==null)
                                            @if(Session::has('order_id')&& Session::get('order_id')  !==null)
                                            <hr>
                                            <p>Grand Total<span>${{Session::get('total')}}</span></p>
                                            <hr>
                                            <div id="payfast-btn">
                                                @php echo $htmlForm;  @endphp
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection