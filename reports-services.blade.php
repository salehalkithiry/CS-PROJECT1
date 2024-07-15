<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <h2 class="text-2xl font-bold mb-4">Report for Truck Services</h2>

        @if ($services->isEmpty())
            <p>No services found for this truck.</p>
        @else
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Service ID</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Truck ID</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Service Date</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Next Service</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Serviced By</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Services</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Total Cost</th>
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
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @foreach ($service->services as $item)
                                    <div>{{ $item['service'] }}: {{ $item['cost'] }}</div>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $service->total_cost }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="flex justify-end mt-4">
            <form method="GET" action="{{ route('download-report') }}">
                @foreach ($services as $service)
                    <input type="hidden" name="service_ids[]" value="{{ $service->serviceId }}">
                @endforeach
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Download Report</button>
            </form>
        </div>

        <!-- <a href="{{ route('truck-services', ['id' => $services->first()->truck_id ?? null]) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-4">Back to Services</a> -->
    </div>
</x-app-layout>
