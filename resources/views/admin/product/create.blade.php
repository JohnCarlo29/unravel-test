<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Product') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-1/2 mx-auto p-4">
                <div class="card flex flex-col items-center p-5 bg-white rounded-lg shadow-2xl">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>

                    <div class="w-full">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf

                            <div>
                                <x-label for="name" :value="__('Product Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="description" :value="__('Description')" />

                                <x-text-area id="description" class="block mt-1 w-full" name="description" required autofocus>{{ old('description') }}</x-text-area>
                            </div>

                            <div class="mt-4">
                                <x-label for="price" :value="__('Price')" />

                                <x-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price')" required autofocus />
                            </div>

                            <button class="bg-blue-400 rounded-full px-4 py-2 mt-4 text-white text-sm" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>