<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-1/2 mx-auto p-4">
                <div class="card flex flex-col p-5 bg-white rounded-lg shadow-2xl">
                    <div class="w-full">
                            <div class="flex">
                                <span class="w-1/2 font-bold">Product Name:</span> 
                                <span class="w-1/2">{{ $product->name }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Description:</span>
                                <span class="w-1/2">{{ $product->description }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Price</span>
                                <span class="w-1/2">{{ $product->price }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Slug:</span>
                                <span class="w-1/2">{{ $product->slug }}</span>
                            </div>
                        </ul>
                    </div>
                    
                    <a href="{{ route('admin.products.index') }}" class=" w-1/4 bg-blue-500 rounded-full mt-6 py-2 text-white text-sm text-center font-bold">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
