<x-app-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    </x-slot>

    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customers') }}
            </h2>

            <a href="{{ route('customers.create') }}" class=" text-gray-700 font-bold underline">
                {{ __('Create Customer') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="display" id="customers-table">
                    <thead>
                    <tr>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Customer Code') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Customer Name') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Address') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Phone') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Email') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Created By') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Created At') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Updated By') }}</th>
                        <th class="text-sm  font-medium text-gray-500 tracking-wider">{{ __('Updated At') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>

            <script>
                $(document).ready(function () {
                    $('#customers-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route("customers.data") }}',
                        language: {
                            url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/tr.json',
                        },
                        aLengthMenu: [
                            [10, 20, 30, 50, 100, -1],
                            [10, 20, 30, 50, 100, "{{ __('All') }}"]
                        ],
                        columns: [
                            {data: 'code', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'name', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'address', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'phone', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'email', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'created_by', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'created_at', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'updated_by', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'updated_at', className: 'text-xs  font-medium text-gray-900 tracking-wider'},
                            {data: 'action', orderable: false, searchable: false},
                        ]
                    });
                });
            </script>
        </div>
    </div>
</x-app-layout>
