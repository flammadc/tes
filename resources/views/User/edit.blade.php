<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check Out') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                <div
                    class="flex flex-col py-3 px-4 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
                    <div class="w-1/6">

                        <img class=" object-cover aspect-square shadow-sm w-full rounded-lg h-96 md:h-auto md:w-48 md:rounded-lg"
                            src="{{ asset('img/' . $printer->img) }}" alt="">
                    </div>
                    <div class="w-4/6 flex flex-col p-4 leading-normal">
                        <h5 class="text-2xl font-semibold tracking-tight text-gray-900 ">
                            {{ $printer->name }}</h5>
                        <p class="my-1 text-base font-semibold text-gray-900">Rp.
                            {{ number_format($printer->price, 0, ',', '.') }}
                        </p>
                        <div>
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
                        </div>

                        <p class="mt-2 font-normal text-gray-700 ">{{ $printer->desc }}</p>
                    </div>
                    <form class="w-1/6 flex flex-col items-end " action="{{ route('user.update', $printer->id) }}"
                        method="post">
                        @csrf

                        <label for="qty" class="block mb-2 text-base font-semibold text-gray-900 ">Quantity</label>
                        <input type="number" id="qty"
                            class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            value="1" name="qty" required min="1" max="{{$printer->qty}}">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buy</button>
                    </form>

                </div>

                @if (Session::has('error'))
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">

                        <span class="font-medium">Out of Stock!</span>
                    </div>
                @endif
                @if (Session::has('min'))
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">

                        <span class="font-medium">Somethings Wrong!</span>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
