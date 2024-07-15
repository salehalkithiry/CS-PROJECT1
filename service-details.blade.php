<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="overflow-hidden shadow sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Service Details</h2>
                @if ($service)
                    <div class="grid grid-cols-2 gap-x-8 mb-4">
                        <div>
                            <p><span class="font-bold">Service ID:</span> {{ $service->serviceId }}</p>
                            <p><span class="font-bold">Truck ID:</span> {{ $service->truck_id }}</p>
                            <p><span class="font-bold">Plate Number:</span> {{ $service->plate_number }}</p>
                        </div>
                        <div>
                            <p><span class="font-bold">Service Date:</span> {{ $service->service_date }}</p>
                            <p><span class="font-bold">Next Service:</span> {{ $service->next_service }}</p>
                        </div>
                    </div>

                    <!-- Display Services -->
                    <div class="mt-4">
                        <p class="font-bold mb-2">Services</p>
                        <table class="min-w-full bg-white divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cost</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($service->services as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $item['service'] }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $item['cost'] }}</td>
                                    </tr>
                                @endforeach
                                <tr class="bg-gray-100">
                                    <td class="px-6 py-4 whitespace-no-wrap font-bold">Total Cost</td>
                                    <td class="px-6 py-4 whitespace-no-wrap font-bold">{{ $service->total_cost }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="mt-4"><span class="font-bold">Serviced By:</span> {{ $service->serviced_by }}</p>

                    <div class="flex justify-end mt-4">
                        <a href="{{ route('truck-services', $service->truck_id) }}" class="bg-indigo-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Services</a>
                    </div>
                @else
                    <p>No service details found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>