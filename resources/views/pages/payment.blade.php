{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Add Card Details
                    {{-- <div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div> --}}
                </h3>
            </div>
            <div class="container p-5">
                <div class="form" style="width: 500px;margin: 0 auto">
                    <div class="form-group">
                        <label>Card Holder Name:</label>
                        <input id="card-holder-name" class="form-control form-control-solid" placeholder="Enter Card holder name" type="text">
                        
                       </div>
                    <div id="card-element">
                      <!-- Elements will create input elements here -->
                    </div>
                  
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
                  
                    <div class="card-footer text-center">
                        <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-primary mr-2">Update Payment Method</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                       </div>
                 
                </div>

                    
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe("{{env('STRIPE_KEY')}}");

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;

cardButton.addEventListener('click', async (e) => {
    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: { name: cardHolderName.value }
            }
        }
    );

    if (error) {
        // Display "error.message" to the user...
    } else {
        // The card has been verified successfully...
        // alert(setupIntent);
        var d = setupIntent.payment_method
        console.log(setupIntent);
       
    $.ajax({
    type:'POST',
    url:'/payment',
    data:{d,"_token": "{{ csrf_token() }}"},
    success:function(data){
        window.location.href = '/';
    }
});
    }
});



// form.addEventListener('submit', function(ev) {
//   ev.preventDefault();
//     var name = document.getElementById("name");
//   // If the client secret was rendered server-side as a data-secret attribute
//   // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
    

//   stripe.confirmCardPayment(form.dataset.secret, {
//     payment_method: {
//       card: card,
//       billing_details: {
//         name: name.value
//       }
//     }
//   }).then(function(result) {
//     if (result.error) {
//       // Show error to your customer (e.g., insufficient funds)
//       console.log(result.error.message);
//     } else {
//       // The payment has been processed!
//       if (result.paymentIntent.status === 'succeeded') {
//         // Show a success message to your customer
//         // There's a risk of the customer closing the window before callback
//         // execution. Set up a webhook or plugin to listen for the
//         // payment_intent.succeeded event that handles any business critical
//         // post-payment actions.
//         console.log(result);
//         var d = result.paymentIntent.id
       
//     $.ajax({
//     type:'POST',
//     url:'/payment',
//     data:{d},
//     success:function(data){
//         alert(data);
//     }
// });
//       }
//     }
//   });
// });
</script>
@endsection
