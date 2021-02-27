<div>
    <form method="post" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        Product Name: <input type="text" name="name" value="{{ $product->name }}" /> <br/>
        Description: <textarea name="description">{{ $product->description }}</textarea> <br/>
        Quantity: <input type="number" name="quantity" value="{{ $product->quantity }}" /> <br/>
        Price: <input type="price" name="price" step="0.01" value="{{ $product->price }}"><br/>

        <button type="submit">Submit</button>
    </form>
</div>