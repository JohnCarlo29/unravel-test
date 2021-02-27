<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Editing') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">
        <br/>
        <br/>

        @if ($errors->any())
        <div style="background-color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
            Product Name: <input type="text" name="name" value="{{ $product->name }}" /> <br/>
            Description: <textarea name="description">{{ $product->description }}</textarea> <br/>
            Quantity: <input type="number" name="quantity" value="{{ $product->quantity }}" /> <br/>
            Price: <input type="number" name="price" step="0.01" value="{{ $product->price }}"><br/>
            <br/>
            <br/>
            <button type="submit">Submit</button>
        </form>

        <br/>
        <br/>
        <a href="{{ route('products.index') }}">Go Back</a>
    </div>
</x-app-layout>