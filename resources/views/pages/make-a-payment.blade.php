@extends('layouts.app')

@section('content')

<section class="container py-8 text-center">

<h1 class="text-xl font-bold" >{{ $page->title }}</h1>

<div class="payment-content">

{!! $page->content !!}

</div>

</section>

{{-- ================= Make A Payment ================= --}}

<section class="py-5 bg-light make-payment">
    <div class="container mx-auto  py-1 text-center">

        <!-- Top Heading -->
        <p class="text-muted mb-5">
            Welcome to our secure online payment portal powered by PayPal! We are pleased to offer our clients the convenience of making their payments online using PayPal’s secure platform. Whether you are paying an invoice or making a general payment, our portal makes it easy and secure to do so.<br><br>
            Your payment information is protected by PayPal’s high level of security, so you can rest assured that your data is safe with us. Simply enter the amount you would like to pay and follow the prompts to complete your payment. Thank you for choosing our accounting firm, and we look forward to helping you with all of your financial needs.
        </p>
        <a href="https://www.paypal.com/webapps/shoppingcart?flowlogging_id=f59250841efc5&mfid=1774348833424_f59250841efc5#/checkout/openButton">
        <img src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" class="mt-4" style="width: 200px;     margin: auto;
"></a>
    </div>
</section>
@endsection