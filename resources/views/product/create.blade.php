<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Creation') }}
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

        <form method="post" action="{{ route('products.store') }}">
            @csrf
            Product Name: <input type="text" name="name" value="" /> <br/>
            Description: <textarea name="description"></textarea> <br/>
            Quantity: <input type="number" name="quantity" value="" /> <br/>
            Price: <input type="number" name="price" step="0.01"><br/>
            <br/>
            <br/>
            <button type="submit">Submit</button>
        </form>

        <br/>
        <br/>
        <a href="{{ route('products.index') }}">Go Back</a>
    </div>
</x-app-layout>