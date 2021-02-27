<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Listing') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">
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
</x-app-layout>