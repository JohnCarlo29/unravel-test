<div>
    <h3>Customer List</h3>
    <br/>
    <br/>

    <table>
        <tr>
            <th>Customer Name</th>
            <th>Action</th>
        </tr>

        @foreach($customers as $customer)
        <tr>
            <th>{{ $customer->name }}</th>
            <th>
                <a href="{{ route('customers.show', $customer->id) }}">View</a>
            </th>
        </tr>
        @endforeach
    </table>

    <br/>
    <br/>

    {{ $customers->links() }}
</div>