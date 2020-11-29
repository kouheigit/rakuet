<link rel="stylesheet" href="{{ asset('css/stripecss.css') }}">
<div id="stripe">
 <h1 class="stripe3">有料プランに登録する</h1>
  <div class="stripe2">
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
  </div>
</div>

