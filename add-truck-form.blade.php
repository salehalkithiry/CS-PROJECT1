<!-- resources/views/add-truck-form.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('store-truck') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                        <input type="text" name="plate_number" id="plate_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                        <input type="text" name="make" id="make" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                        <input type="text" name="model" id="model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="date_bought" class="block text-sm font-medium text-gray-700">Date Bought</label>
                        <input type="date" name="date_bought" id="date_bought" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="submit" class="bg-indigo-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">Add Truck</button>
                        <a href="{{ route('view-trucks') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">Back to View Trucks</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
