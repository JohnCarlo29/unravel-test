<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Your Cart') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-1/2 mx-auto p-4">
                <div class="card flex flex-col items-center p-5 bg-white rounded-lg shadow-2xl">
                    <div class="w-full">
                        <table class="table-fixed text-center">
                            <thead>
                                <tr class="border">
                                    <th class="w-1/4 p-3">Product</th>
                                    <th class="w-1/2 p-3">Quantity</th>
                                    <th class="w-1/4 p-3">Sub Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="border">
                                    <td class="p-3">{{ $product['item']['name'] }}</td>
                                    <td class="p-3">{{ $product['quantity'] }}</td>
                                    <td class="p-3">{{ $product['quantity'] * $product['item']['price'] }} $</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <a href="{{ route('cart.checkout') }}" class="rounded-full w-1/2 border-2 border-transparent bg-blue-500 px-2 py-3 mt-4 text-uppercase text-sm text-white font-bold text-center">Check out</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product') }}
            </h2>

            <div>
                Shopping Cart {{ session('cart') ? session('cart')->totalQuantity : 0 }}
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('cart'))
            @foreach($products as $product)
            <div class="flex justify-between">
                <span>{{ $product['item']['name'] }}</span>
                <span>{{ $product['quantity'] }}</span>
                <span>{{ $product['quantity'] * $product['item']['price'] }}</span>
            </div>
            @endforeach
            <span>Total: {{ $totalPrice }}</span>
            <a href="{{ route('cart.checkout') }}">Check out</a>
            @endif
        </div>
    </div>
</x-app-layout>