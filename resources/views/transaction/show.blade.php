<div>
    <h3>Transaction Detail</h3>
    <br/>
    <br/>

    Customer Name: {{ $transaction->customer->name }} <br/>
    Product Avail: {{ $transaction->product->name }} <br/>
    No of items purchased: {{ $transaction->availed_quantity }} <br/>
    Total Price: {{ $transaction->total }} <br/>
    Transaction Date: {{ $transaction->created_at }} <br/>
    <br/>
    <br/>
    <a href="{{ route('transactions.index') }}">Go Back</a>
</div>