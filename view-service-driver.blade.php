<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Services for Truck {{ $truck->plate_number }}</h2>
            <a href="{{ route('driver-dashboard') }}" class="bg-indigo-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow-md transition duration-200">Back to Dashboard</a>
        </div>

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
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Next Service</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Serviced By</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($services as $service)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $service->serviceId }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $service->truck_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $service->plate_number }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $service->service_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $service->next_service }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $service->serviced_by }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
