@extends('layouts.app4')
@section('body')
<div class="content">
     <form action="{{ asset('charge') }}" method="POST">
             {{ csrf_field() }}
        <script
               src="https://checkout.stripe.com/checkout.js" class="stripe-button"
               data-key="{{ env('STRIPE_KEY') }}"
               data-amount="1000"
               data-name="Stripe Demo"
               data-label="決済をする"
               data-description="Online course about integrating Stripe"
               data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
               data-locale="auto"
               data-currency="JPY">
                            </script>
                </form>
            </div>
@endsection 
