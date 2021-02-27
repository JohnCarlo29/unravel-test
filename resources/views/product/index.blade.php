<div>
    <h3>Product Listing</h3>
    <br/>
    <br/>
    <a href="{{ route('products.create') }}">Add New Product</a>

    @if(session('success-message'))
        <h3>{{ session('success-message') }}</h3>
    @endif

    @if(session('error-message'))
        <h3>{{ session('error-message') }}</h3>
    @endif

    <table>
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