@extends('layouts.layoutSite.SitePage',['cartcount'=>$cart->get()->count()])
@section('content')
 <!-- breadcrumb area start --><br>
 <div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Payment by credit card')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
 </div> <hr>
<div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div id="payment-message" style="display: none;" class="alert alert-info"></div>

                    <form action="" method="post" id="payment-form">
                        <div id="payment-element"></div>
                        <br><button type="submit" id="submit"  class="btn btn-sqr" >
                            <span id="button-text">{{__('Pay now')}}</span>
                            <span id="spinner" style="display: none;">Processing...</span>
                        </button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    @stop

@push('js') 

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        if (Notification.permission !== "granted") {
        Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
            // User granted permission, set cookies here
            }
        });
        } else {
        // Cookies have already been granted, set cookies here
        }
        // This is your test publishable API key.
        const stripe = Stripe("{{ config('services.stripe.publishable_key') }}");

        let elements;

        initialize();

        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);

        // Fetches a payment intent and captures the client secret
        async function initialize() {
            const {
                clientSecret
            } = await fetch("{{ route('stripe.paymentIntent.create', $order->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin": "same-origin"
                },
                body: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    "total": "{{$order->total}}",
                    "id": "{{$order->id}}"
                }),
            }).then((r) => r.json());
            localStorage.setItem('clientSecret', clientSecret);

            elements = stripe.elements({
        clientSecret,
        payment: {
            card: {
                // Only show the Visa card option
                allowedCardNetworks: ['visa'],
                // Customize the appearance of the card field
                style: {
                    base: {
                        color: '#32325d',
                        fontFamily: 'Arial, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                }
            }
        }
    });


            const paymentElement = elements.create("payment");
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);

            const {
                error
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "{{ route('stripe.return', $order->id) }}",
                },
            });



                if (error) {
                showMessage(error.message);
                setLoading(false);
                return;
            }

            // Payment succeeded, update the payment status and order status
            const orderId = {{$order->id}};
            const token = "{{ csrf_token() }}";

            // Make an AJAX request to update the order status
            const response = await  fetch("{{ route('update-payment-status') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": token
                },
                body: JSON.stringify({
                    payment_status: 1,
                    status: 1,
                    paymentIntentId: paymentIntent.id,
                    orderId: {{$order->id}},
                }),
            });
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occurred.");
            }

            setLoading(false);
        }
        
        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.style.display = "block";
            messageContainer.textContent = messageText;

            setTimeout(function() {
                messageContainer.style.display = "none";
                messageText.textContent = "";
            }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").style.display = "inline";
                document.querySelector("#button-text").style.display = "none";
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").style.display = "none";
                document.querySelector("#button-text").style.display = "inline";
            }
        }
    </script>
 @endpush