<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Transaction List') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-3/4 mx-auto p-4">
                <div class="card flex flex-col items-center p-5 bg-white rounded-lg shadow-2xl">
                    <table class="w-full table text-center">
                        <thead>
                            <tr class="border">
                                <th class="w-1/3 p-3">Transaction ID</th>
                                <th class="w-1/3 p-3">Customer Name</th>
                                <th class="w-1/3 p-3">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr class="border">
                                <td class="p-3">{{ $transaction->transaction_id }}</td>
                                <td class="p-3">{{ optional($transaction->user)->name }}</td>
                                <td class="p-3">
                                    <a href="{{ route('admin.transactions.show', $transaction->id) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>