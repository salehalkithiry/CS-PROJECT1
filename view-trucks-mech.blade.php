<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <!-- Flash message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <!-- Display Error Message -->
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <!-- Search Form -->
            <form action="{{ route('search-trucks') }}" method="GET" class="flex-1">
                <div class="flex w-full">
                    <input type="text" name="search" placeholder="Search by Truck ID or Plate Number" class="px-3 py-2 border border-gray-300 rounded-l-md w-3/4">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-r-md shadow-md transition duration-200 w-1/4">
                        Search
                    </button>
                </div>
            </form>
            <!-- Back to Dashboard Button -->
            <a href="{{ route('mechanic-dashboard') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200 ml-4">
                Back to Dashboard
            </a>
        </div>

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
                                        <a href="{{ route('add-service', $truck->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Add Service</a>
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
