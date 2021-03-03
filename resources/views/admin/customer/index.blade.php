<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customer List') }}
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
                                    <th class="w-1/4 p-3">Customer Name</th>
                                    <th class="w-1/2 p-3">Email</th>
                                    <th class="w-1/4 p-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr class="border">
                                    <td class="p-3">{{ $customer->name }}</td>
                                    <td class="p-3">{{ $customer->email }}</td>
                                    <td class="p-3">
                                        <a href="{{ route('admin.customers.show', $customer->id) }}">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
