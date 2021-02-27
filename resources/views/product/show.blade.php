<div>
Product Name: {{ $product->name}} <br/>
Description: {{ $product->description}} <br/>
Quantity: {{ $product->quantity}} <br/>
Price: {{ $product->price}} <br/>

<a href="{{ route('products.index') }}">Go Back</a>
</div>