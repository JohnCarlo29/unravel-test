<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Listing') }}
        </h2>
    </x-slot>

    <div class="py-12 px-24">
        <br/>
        <br/>

        <table>
            <tr>
                <th>Customer Name</th>
                <th>Action</th>
            </tr>

            @foreach($customers as $customer)
            <tr>
                <th>{{ $customer->name }}</th>
                <th>
                    <a href="{{ route('customers.show', $customer->id) }}">View</a>
                </th>
            </tr>
            @endforeach
        </table>

        <br/>
        <br/>

        {{ $customers->links() }}
    </div>
</x-app-layout>