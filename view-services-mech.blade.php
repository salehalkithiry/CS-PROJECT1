<!-- resources/views/services/view-services-mech.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="text-center mb-4">
            <h2 class="text-2xl font-bold">Services</h2>
        </div>
        
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between mb-4">
                    <!-- Search form -->
                    <form action="{{ route('search-services-by-plate') }}" method="GET" class="flex items-center">
                        <input type="text" name="plate_number" id="plate_number" class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Search by Plate Number">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-indigo-600">Search</button>
                    </form>
                    
                    <!-- Button to go to view-trucks -->
                    <a href="{{ route('mechanic-dashboard') }}" class="inline-block bg-black text-red-500 px-6 py-3 rounded-lg shadow-md transition duration-200">Back</a>
                </div>

                @if ($services->isEmpty())
                    <p>No services found.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Truck ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serviced By</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($services as $service)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $service->serviceId }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $service->truck_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $service->plate_number }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $service->service_date }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $service->serviced_by }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('view-service-details', $service->serviceId) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
