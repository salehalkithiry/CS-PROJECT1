<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-4">
            <!-- Search Form -->
            <form action="{{ route('search-trucksadmin') }}" method="GET" class="flex-1">
                <div class="flex">
                    <input type="text" name="search" placeholder="Search by Plate Number" class="px-3 py-2 border border-gray-300 rounded-l-md w-3/4">
                    <button type="submit" class="bg-red-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-r-md shadow-md transition duration-200">
                        Search
                    </button>
                </div>
            </form>
            <!-- Add New Truck and Back to Dashboard Buttons -->
            <div class="flex space-x-4 ml-4">
                <a href="{{ route('add-truck') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md shadow-md transition duration-200">Add New Truck</a>
                <a href="{{ route('dashboard') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md shadow-md transition duration-200">Back to Dashboard</a>
            </div>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Truck ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Make</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Model</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Bought</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($trucks as $truck)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->plate_number }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->make }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->model }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->date_bought }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('edit-truck', $truck->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                        <a href="{{ route('truck-services', $truck->id) }}" class="text-green-600 hover:text-green-900 mr-2">Services</a>
                                        <form action="{{ route('delete-truck', $truck->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-blue-900" onclick="return confirm('Are you sure you want to delete this truck?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
