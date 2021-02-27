<div>
    <h3>Customer Detail</h3>
    <br/>
    <br/>

    Customer Name: {{ $customer->name }} <br/>
    Age: {{ $customer->age }} <br/>
    Address: {{ $customer->address }} <br/>
    Last Transaction: {{ $customer->last_transaction }} <br/>
    <br/>
    <a href="{{ route('customers.index') }}">Go Back</a>
</div>