<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">
        <br/>
        <br/>

        Customer Name: {{ $customer->name }} <br/>
        Age: {{ $customer->age }} <br/>
        Address: {{ $customer->address }} <br/>
        Last Transaction: {{ $customer->last_transaction }} <br/>
        <br/>
        <a href="{{ route('customers.index') }}">Go Back</a>
    </div>
</x-app-layout>