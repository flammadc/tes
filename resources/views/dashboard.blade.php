<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
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
                        @forelse ($printers as $printer)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">

                                    <img class="rounded-sm w-20 h-20" src="{{ asset('img/' . $printer->img) }}"
                                        alt="image description">
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                                    {{ $printer->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $printer->qty }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp. {{ number_format($printer->price, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $printer->desc }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href={{ route('printer.edit', $printer->id) }}>
                                            <x-feathericon-edit />
                                        </a>
                                        <a href="{{ route('printer.destroy', $printer->id) }}">
                                            <x-feathericon-x />

                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>

                                <div class="mt-2 p-4 mb-4 text-sm text-gray-900 rounded-lg bg-white" role="alert">
                                    <span class="font-medium">

                                        No item here
                                    </span>
                                </div>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>

            @if (Session::has('success'))
                <div class="mt-2 p-4 mb-4 text-sm text-green-400-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('updated'))
                <div class="mt-2 p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">

                    <span class="font-medium">Updated alert!</span> {{ Session::get('updated') }}
                </div>
            @endif
            @if (Session::has('delete'))
                <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">

                    <span class="font-medium">Deleted alert!</span> {{ Session::get('delete') }}
                </div>
            @endif


        </div>
    </div>
</x-app-layout>
