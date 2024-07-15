<!-- resources/views/truck-services.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Services for Truck {{ $truck->plate_number }}</h2>

            <!-- Back button to view-trucks -->
            <a href="{{ route('view-trucks') }}" class="bg-indigo-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">Back to View Trucks</a>
        </div>

        @if ($services->isEmpty())
            @if (request()->has('search') || request()->has('start_date') || request()->has('end_date'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        showAlert();
                    });

                    function showAlert() {
                        if (confirm('No services found for the given criteria. Click "Okay" to go back.")) {
                            window.location.href = "{{ route('truck-services', $truck->id) }}";
                        }
                    }
                </script>
            @else
                <p>No services recorded for this truck.</p>
            @endif
        @else
        
        <!-- Search form by Service ID -->
        <form method="GET" action="{{ route('truck-services', $truck->id) }}" class="mb-4">
        <div class="flex items-center">
        <input type="text" name="search" placeholder="Search by Service ID" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Search</button>
        </div>
        </form>
        
        <!-- Search form by Date Range -->
        <form method="GET" action="{{ route('truck-services', $truck->id) }}" class="mb-4">
        <div class="flex items-center">
        <input type="date" name="start_date" placeholder="Start Date" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span class="mx-2"> -To- </span>
        <input type="date" name="end_date" placeholder="End Date" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <button type="submit" class="ml-4 bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">Search</button>
        </div>
        </form>
        
        <!-- Form to Generate Report -->
        <form method="POST" action="{{ route('generate-report') }}" class="mb-4">
        @csrf
        @foreach ($services as $service)
        <input type="hidden" name="service_ids[]" value="{{ $service->serviceId }}">
        @endforeach
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Generate Report</button>
        </form>
        
        <!-- Refresh button -->
        <form method="GET" action="{{ route('truck-services', $truck->id) }}" class="mb-4">
            <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                Clear Filters
            </button>
        </form>
            <!-- Table displaying services -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Service ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Truck ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Service Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Serviced By</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
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
                                        <a href="{{ route('service-details', $service->serviceId) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
