<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Listing') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">

    <a href="{{ route('products.create') }}">Add New Product HERE</a>

    @if(session('success-message'))
        <h3 style="color:deepskyblue">{{ session('success-message') }}</h3>
    @endif

    @if(session('error-message'))
        <h3 style="color:olive">{{ session('error-message') }}</h3>
    @endif

    <br/>
    <br/>

    <table style="width: 1000px;">
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <th>{{ $product->name }}</th>
            <th>{{ $product->description }}</th>
            <th>{{ $product->quantity }}</th>
            <th>{{ $product->price }}</th>
            <th>
                <a href="{{ route('products.show', $product->id) }}">View</a>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>

    <br/>
    <br/>

    {{ $products->links() }}
</div>
</x-app-layout>