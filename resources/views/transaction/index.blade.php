<div>
    <h3>Transaction List</h3>
    <br/>
    <br/>

    <table>
        <tr>
            <th>Customer Name</th>
            <th>Transaction Date</th>
            <th>Action</th>
        </tr>

        @foreach($transactions as $transaction)
        <tr>
            <th>{{ $transaction->customer->name }}</th>
            <th>{{ $transaction->created_at }}</th>
            <th>
                <a href="{{ route('transactions.show', $transaction->id) }}">View</a>
            </th>
        </tr>
        @endforeach
    </table>

    <br/>
    <br/>

    {{ $transactions->links() }}
</div>