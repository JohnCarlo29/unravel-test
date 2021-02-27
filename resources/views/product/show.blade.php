<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Creation') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">
    <br/>
    <br/>

    Product Name: {{ $product->name}} <br/>
    Description: {{ $product->description}} <br/>
    Quantity: {{ $product->quantity}} <br/>
    Price: {{ $product->price}} <br/>

    <a href="{{ route('products.index') }}">Go Back</a>
    </div>
</x-app-layout>