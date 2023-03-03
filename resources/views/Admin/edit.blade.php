<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form>

                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                Name</label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                value="{{ $printer->name }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                            <input type="number" id="qty"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                value="{{ $printer->qty }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                            <input type="number" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                value="{{ $printer->price }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                            <input type="text" id="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                value="{{ $printer->desc }}" required>
                        </div>


                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
