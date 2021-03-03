<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Transaction') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table-fixed text-center">
                <thead>
                    <tr class="border">
                        <th class="w-1/4 p-3">Transaction Id</th>
                        <th class="w-1/2 p-3">Products</th>
                        <th class="w-1/4 p-3">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="border">
                        <td class="w-1/4 p-3">{{ $transaction->transaction_id }}</td>
                        <td class="w-1/2 p-3">
                            <table class="table-fixed w-96">
                                <thead>
                                    <tr class="border">
                                        <th class="w-1/2 p-3">Product</th>
                                        <th class="w-1/4 p-3">Quantity</th>
                                        <th class="w-1/4 p-3">Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($transaction->products as $product)
                                    <tr class="border">
                                        <td class="p-2">{{ $product->name }}</td>
                                        <td class="p-2">{{ $product->price }}</td>
                                        <td class="p-2">{{ $product->pivot->quantity }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </ul>
                        </td>
                        <td class="w-1/4 p-3">{{ $transaction->total / 100 }} $</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>