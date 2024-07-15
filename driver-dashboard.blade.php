<!-- resources/views/driver-dashboard.blade.php -->

<x-app-layout>
    <div class="py-6 flex justify-center">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 text-center">Assigned Truck Details</h2>
                    
                    @if ($truck)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Truck ID</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Make</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Model</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Bought</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Services</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->plate_number }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->make }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->model }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->date_bought }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <a href="{{ route('truck-services-driver', $truck->id) }}" class="text-blue-600 hover:text-blue-900">View Services</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-gray-500">No truck has been assigned to you.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
