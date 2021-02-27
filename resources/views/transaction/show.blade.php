<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">
        <br/>
        <br/>

        Customer Name: {{ $transaction->customer->name }} <br/>
        Product Avail: {{ $transaction->product->name }} <br/>
        No of items purchased: {{ $transaction->availed_quantity }} <br/>
        Total Price: {{ $transaction->total }} <br/>
        Transaction Date: {{ $transaction->created_at }} <br/>
        <br/>
        <br/>
        <a href="{{ route('transactions.index') }}">Go Back</a>
    </div>
</x-app-layout>