<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="container mx-auto w-1/4 p-4">
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
                            <button class="px-4 py-2 transition ease-in duration-200 uppercase text-sm rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                <a href="{{ route('products.show', $product->id) }}">View Details</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>