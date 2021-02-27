<div>
    <h3>Adding of Product</h3>
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
        Price: <input type="price" name="price" step="0.01"><br/>

        <button type="submit">Submit</button>
    </form>
</div>