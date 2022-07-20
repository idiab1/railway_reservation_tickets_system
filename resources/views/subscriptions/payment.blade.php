@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.subscriptions') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        /* Sub Header */
        .sub-header {
            height: 270px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sub-header .header-box .header-info {
            width: auto;
            margin-top: 0;
            text-align: center;
        }

    </style>
@endsection

{{-- Header --}}
@section('header-info')
    <!-- Header info -->
    <div class="header-info">
        <h1>{{ trans('site.subscriptions') }}</h1>
    </div>
    <!-- End of Header info -->
@endsection

@section('content')
<!-- subscription Section -->
<section class="subscription-section section">

    <!-- Container fluid -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">{{ __('Checkout page') }}</div>

                    <div class="card-body">
                        <form id="payment-form" action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                            </div>
                            <div class="form-group">
                                <label for="">Card details</label>
                                <div id="card-element"></div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container fluid -->
</section>
<!-- End of subscriptions Section -->


@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
<!--Custom script -->
<script src="{{asset('js/custom.js')}}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('cashier.key') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')

            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit();
        }
    })
</script>

@endsection


