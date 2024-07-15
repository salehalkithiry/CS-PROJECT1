<!-- resources/views/edit-truck.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Edit Truck Details</h2>
                    <a href="{{ route('view-trucks') }}" class="bg-indigo-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">Back to View Trucks</a>
                </div>

                <form action="{{ route('update-truck', $truck->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                        <input type="text" name="plate_number" id="plate_number" value="{{ $truck->plate_number }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                        <input type="text" name="make" id="make" value="{{ $truck->make }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                        <input type="text" name="model" id="model" value="{{ $truck->model }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_bought" class="block text-sm font-medium text-gray-700">Date Bought</label>
                        <input type="date" name="date_bought" id="date_bought" value="{{ $truck->date_bought }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-indigo-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">Update Truck</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
