<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product List') }}
            </h2>

            <a href="{{ route('admin.products.create') }}">Add Product</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success-message'))
            <div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
                <p>{{ session('success-message') }}</p>
            </div>
            @endif

            @if(session('error-message'))
            <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                <p>{{ session('error-message') }}</p>
            </div>
            @endif

            <div class="container w-3/4 mx-auto p-4">
                <div class="card flex flex-col items-center p-5 bg-white rounded-lg shadow-2xl">
                    <table class="w-full table text-center">
                        <thead>
                            <tr class="border">
                                <th class="w-1/3 p-3">Product ID</th>
                                <th class="w-1/3 p-3">Product Name</th>
                                <th class="w-1/3 p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="border">
                                <td class="p-3">{{ $product->id }}</td>
                                <td class="p-3">{{ $product->name }}</td>
                                <td class="p-3">
                                    <a href="{{ route('admin.products.show', $product->id) }}">View</a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>