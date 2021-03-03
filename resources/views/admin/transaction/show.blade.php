<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Transaction Details') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-1/2 mx-auto p-4">
                <div class="card flex flex-col p-5 bg-white rounded-lg shadow-2xl">
                    <div class="w-full">
                            <div class="flex">
                                <span class="w-1/2 font-bold">Transaction ID:</span> 
                                <span class="w-1/2">{{ $transaction->transaction_id }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Transaction Date:</span>
                                <span class="w-1/2">{{ $transaction->created_at }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Customer Name:</span>
                                <span class="w-1/2">{{ $transaction->user->name }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Products Availed:</span>
                                <ul class="w-1/2">
                                    @foreach($transaction->products as $product)
                                    <li>{{ $product->name }} * {{ $product->pivot->quantity  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Total Price:</span>
                                <span class="w-1/2">{{ $transaction->total / 100 }}</span>
                            </div>
                        </ul>
                    </div>
                    
                    <a href="{{ route('admin.transactions.index') }}" class=" w-1/4 bg-blue-500 rounded-full mt-6 py-2 text-white text-sm text-center font-bold">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
