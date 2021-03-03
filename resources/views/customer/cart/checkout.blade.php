<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Checkout Items') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-1/2 mx-auto p-4">
                <div class="card flex flex-col items-center p-5 bg-white rounded-lg shadow-2xl">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>

                    <div class="w-full">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form role="form" action="{{ route('cart.pay') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Card Number -->
                            <div class="mt-4">
                                <x-label for="card-number" :value="__('Card Number')" />

                                <x-input id="card-number" class="block mt-1 w-full card-number" type="text" name="card-number" :value="old('card-number')" required autofocus />
                            </div>

                            <div class="flex -mx-2 mt-4">
                                <!-- CVC -->
                                <div class="w-1/3 px-2">
                                    <x-label for="card-cvc" :value="__('Card CVC')" />

                                    <x-input id="card-cvc" class="block mt-1 w-full card-cvc" type="text" name="card-cvc" :value="old('card-cvc')" required autofocus />
                                </div>

                                <!-- CVC -->
                                <div class="w-1/3 px-2">
                                    <x-label for="card-expiry-month" :value="__('Expiry Month')" />

                                    <x-input id="card-expiry-month" class="block mt-1 w-full card-expiry-month" type="text" name="card-expiry-month" :value="old('card-expiry-month')" required autofocus />
                                </div>

                                <!-- CVC -->
                                <div class="w-1/3 px-2">
                                    <x-label for="card-expiry-year" :value="__('Expiry Year')" />

                                    <x-input id="card-expiry-year" class="block mt-1 w-full card-expiry-year" type="text" name="card-expiry-year" :value="old('card-expiry-year')" required autofocus />
                                </div>
                            </div>

                            <button class="" id="submit">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript" defer>
    $(document).ready(function() {
        var $form = $(".require-validation");
        $('#submit').click(function(e) {
            e.preventDefault();
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('#card-number').val(),
                    cvc: $('#card-cvc').val(),
                    exp_month: $('#card-expiry-month').val(),
                    exp_year: $('#card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                // $form.get(0).submit();
            }
        }

    });
</script>
@endpush