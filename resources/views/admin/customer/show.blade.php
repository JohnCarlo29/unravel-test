<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customer Details') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container w-1/2 mx-auto p-4">
                <div class="card flex flex-col p-5 bg-white rounded-lg shadow-2xl">
                    <div class="w-full">
                            <div class="flex">
                                <span class="w-1/2 font-bold">Customer Name:</span> 
                                <span class="w-1/2">{{ $customer->name }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Email Address:</span>
                                <span class="w-1/2">{{ $customer->email }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Address:</span>
                                <span class="w-1/2">{{ $customer->address }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">City:</span>
                                <span class="w-1/2">{{ $customer->city }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Zip Code:</span>
                                <span class="w-1/2">{{ $customer->zip_code }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-1/2 font-bold">Last Transaction:</span>
                                <span class="w-1/2">{{ $customer->orders->isNotEmpty() ? $customer->orders[0]->created_at : '---' }}</span>
                            </div>
                        </ul>
                    </div>
                    
                    <a href="{{ route('admin.customers.index') }}" class=" w-1/4 bg-blue-500 rounded-full mt-6 py-2 text-white text-sm text-center font-bold">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
