@extends('layouts.appplan')
@section('body')
<link rel="stylesheet" href="{{ asset('css/plansub.css') }}">
<h1 class="paid">有料サービスの御案内</h1>
<p class="paidsub">有料サービスに登録するとダイエット診断を受けずにお好きなダイエットプランをご自由に選ぶことが可能です。(登録料１００円)</p>
<p class="paidcauntion">※一度登録すると再度登録する必要はありません※お支払はクレジットカードのみ対応しています</p>
  <form action="{{ asset('charge') }}" method="POST">
             {{ csrf_field() }}
        <script
               src="https://checkout.stripe.com/checkout.js" class="stripe-button"
               data-key="{{ env('STRIPE_KEY') }}"
               data-amount="100"
               data-name="Stripe Demo"
               data-label="決済をする"
               data-description="Online course about integrating Stripe"
               data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
               data-locale="auto"
               data-currency="JPY">
          </script>
  </form>
  @endsection
