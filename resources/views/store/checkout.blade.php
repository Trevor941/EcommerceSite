

@extends('store.layouts.app')
@section('content')
   <!-- Breadcrumb Start -->
   <div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address pt-3 pb-3">
                                <h2>Billing Address</h2>
                                <form action="{{route('createorder')}}" method="POST" id="checkoutform">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control @error('firstname') is-invalid @enderror" type="text" @error('firstname') is-invalid @enderror placeholder="First Name" name="firstname">
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                       @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control @error('lastname') is-invalid @enderror " type="text" placeholder="Last Name" name="lastname">
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                       @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="E-mail" name="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Mobile No" name="phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Address" name="address">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control @error('city') is-invalid @enderror" type="text" placeholder="City" name="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <input class="form-control @error('country') is-invalid @enderror" type="text" placeholder="Country" name="country">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-6" style="display: none;">
                                        <div >
                                            <button type="submit" class="checkout-btn placeorder">PayPal</button>
                                        </div>
                                    </div> --}}
                                    <input type="hidden" id="paymenttype" name="paymenttype" value="">
                                </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                    <h1>Cart Total</h1>
                                    <hr>
                                    <p>Grand Total<span>${{Session::get('total')}}.00</span></p>
                                </div>
                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>Send and receive money worldwide with paypal.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Payfast</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                South Africa's number one payment gateway.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn mb-2">
                                    <a href="javascript:{}" class="btn btn-indexbtns placeorder" id="paypalbtn" onclick="document.getElementById('checkoutform').submit();">Paypal <i class="fas fa-paypal"></i></a>
                                </div>
                                <div class="checkout-btn">
                                    
                                    <a href="javascript:{}" class="btn btn-indexbtns placeorder" id="payfastbtn" onclick="document.getElementById('checkoutform').submit();">Payfast <i class="fas fa-money"></i></a>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $("#paypalbtn").hide();
        $("#payfastbtn").hide();
        $("#payment-1").click(function () {
       if($(this).prop("checked")) 
          { 
           $("#paypalbtn").show();
           $("#payfastbtn").hide();
           $("#paymenttype").val("paypal")
          }
        });
        $("#payment-4").click(function () {
       if($(this).prop("checked")) 
          { 
            $("#payfastbtn").show();
           $("#paypalbtn").hide();
           $("#paymenttype").val("payfast")
          }
        });
    })
</script>

@endsection