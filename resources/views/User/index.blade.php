<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Collection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('updated'))
                <div class="mt-2 p-4 mb-4 text-sm text-green-400-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium"> {{ Session::get('updated') }}</span>
                </div>
            @endif
            <div
                class="grid grid-cols-2 xl:grid-cols-4 gap-3 gap-y-4 items-center justify-center overflow-hidden sm:rounded-lg">

                @forelse ($printers as $printer)
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg  ">
                        <img class="p-8 rounded-t-lg aspect-square shadow-sm" src="{{ asset('img/' . $printer->img) }}"
                            alt="product image" />
                        <div class="px-5 pb-5">
                            <h5 class="mt-3 mb-1 text-xl font-semibold tracking-tight text-gray-900 ">
                                {{ $printer->name }}</h5>
                            <p class="text-base font-bold text-gray-900 mb-3">Rp.
                                {{ number_format($printer->price, 0, ',', '.') }}
                            </p>


                            <div class="flex items-center justify-between">
                                <span
                                    class="text-xs inline-flex gap-2 p-2 text-blue-800 border border-blue-300 rounded-lg bg-blue-50">
                                    <svg class="w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                        </path>
                                    </svg>
                                    {{ $printer->qty }}
                                </span>
                                <a href="{{ route('user.edit', $printer->id) }}"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>




                @empty
                    <div class="mt-2 p-4 mb-4 text-sm text-gray-900 rounded-lg bg-white" role="alert">
                        <span class="font-medium">

                            No item here
                        </span>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
