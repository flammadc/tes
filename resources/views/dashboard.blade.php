<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Desc
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($printers as $printer)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                                    {{ $printer->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $printer->qty }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp.{{ $printer->price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $printer->desc }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href={{ route('editItem', $printer->id) }}>
                                            <x-feathericon-edit />
                                        </a>
                                        <button>
                                            <x-feathericon-x />

                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
