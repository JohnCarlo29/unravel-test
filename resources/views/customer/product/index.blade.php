<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product') }}
            </h2>

            <a href="{{ route('cart.show') }}">
                Shopping Cart {{ session('cart') ? session('cart')->totalQuantity : 0 }}
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success-message'))
            <div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
                <p>{{ session('success-message') }}</p>
            </div>
            @endif
            <div class="flex flex-wrap">
                @foreach($products as $product)
                <div class="container w-1/4 p-4">
                    <div class="card flex flex-col justify-center p-5 bg-white rounded-lg shadow-2xl">
                        <div class="prod-title">
                            <p class="text-2xl uppercase text-gray-900 font-bold">{{ $product->name }}</p>
                            <p class="uppercase text-sm text-gray-400">
                                {{ $product->description }}
                            </p>
                        </div>
                        <div class="prod-img">
                            <img src="https://unsplash.com/photos/IJjfPInzmdk/download?force=true&w=1920" class="w-full h-48 object-cover object-center" />
                        </div>
                        <div class="flex flex-col md:flex-row justify-between items-center text-gray-900">
                            <p class="font-bold text-xl">{{ $product->price }} $</p>
                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="px-4 py-2 transition ease-in duration-200 uppercase text-sm rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>