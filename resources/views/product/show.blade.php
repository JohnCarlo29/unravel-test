<div>
<h3>Product Detail</h3>
<br/>
<br/>

Product Name: {{ $product->name}} <br/>
Description: {{ $product->description}} <br/>
Quantity: {{ $product->quantity}} <br/>
Price: {{ $product->price}} <br/>

<a href="{{ route('products.index') }}">Go Back</a>
</div>