<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <!-- Top Bar with Search Form and Back to Dashboard Button -->
        <div class="flex justify-between items-center mb-4">
            <form action="{{ route('search-assignments') }}" method="GET" class="flex-1 mr-4">
                <div class="flex">
                    <!-- Search Bar for User ID -->
                    <!-- <div class="flex-1 mr-4">
                        <input type="text" name="user_search" placeholder="Search by User ID" class="px-3 py-2 border border-gray-300 rounded-l-md w-full">
                    </div> -->
                    <!-- Search Bar for Plate Number -->
                    <div class="flex-1 mr-4">
                        <input type="text" name="truck_search" placeholder="Search by Plate Number" class="px-3 py-2 border border-gray-300 rounded-l-md w-full">
                    </div>
                    <!-- Search Button -->
                    <div>
                        <button type="submit" class="bg-indigo-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                            Search
                        </button>
                    </div>
                </div>
            </form>
            <!-- Back to Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                Back to Dashboard
            </a>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Assignments Table -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Assigned Trucks</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Assigned ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Truck ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $assignment->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $assignment->truck_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $assignment->plate_number }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $assignment->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $assignment->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('updating-assign', ['assignment' => $assignment->id]) }}" class="bg-indigo-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                                            Update
                                        </a>
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
