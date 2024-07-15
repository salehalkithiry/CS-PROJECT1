<x-app-layout>
    <div class="py-6 flex justify-center">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 text-center">Add Service for Truck {{ $truck->plate_number }}</h2>
                    
                    <form action="{{ route('save-service', $truck->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Truck ID:</label>
                            <span class="block p-2 border border-gray-300 rounded">{{ $truck->id }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">License Plate:</label>
                            <span class="block p-2 border border-gray-300 rounded">{{ $truck->plate_number }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Current Date:</label>
                            <span class="block p-2 border border-gray-300 rounded">{{ \Carbon\Carbon::now()->toDateString() }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700" for="next_service_date">Next Service Date:</label>
                            <input type="date" id="next_service_date" name="next_service_date" class="p-2 border border-gray-300 rounded w-full" required>
                        </div>
                        <div class="mb-4 flex justify-center">
                            <div class="w-full max-w-4xl">
                                <label class="block text-gray-700">Services and Costs:</label>
                                <table class="min-w-full bg-white border-collapse table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <th class="px-5 py-3 border border-gray-300">Service</th>
                                            <th class="px-5 py-3 border border-gray-300">Cost</th>
                                            <th class="px-5 py-3 border border-gray-300">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="services-table">
                                        <tr>
                                            <td class="px-5 py-4 border border-gray-300">
                                                <input type="text" name="services[]" class="w-full p-2 border border-gray-300 rounded" required>
                                            </td>
                                            <td class="px-5 py-4 border border-gray-300">
                                                <input type="number" name="costs[]" class="w-full p-2 border border-gray-300 rounded" oninput="calculateTotal()" required>
                                            </td>
                                            <td class="px-5 py-4 border border-gray-300">
                                                <button type="button" onclick="deleteRow(this)" class="text-red-600 hover:text-red-900">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="px-5 py-4 border border-gray-300 font-bold">Total</td>
                                            <td class="px-5 py-4 border border-gray-300" id="total-cost">0</td>
                                            <td class="px-5 py-4 border border-gray-300"></td> <!-- Empty cell for alignment -->
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" onclick="addRow()" class="mt-2 bg-indigo-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow-md transition duration-200">Add Row</button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Serviced By:</label>
                            <span class="block p-2 border border-gray-300 rounded">{{ Auth::user()->id }} - {{ Auth::user()->name }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('view-trucks-mech') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded shadow-md transition duration-200">
                                Back to Trucks
                            </a>
                            <button type="submit" class="bg-indigo-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow-md transition duration-200">
                                Save Service
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addRow() {
            const table = document.getElementById('services-table');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td class="px-5 py-4 border border-gray-300">
                    <input type="text" name="services[]" class="w-full p-2 border border-gray-300 rounded" required>
                </td>
                <td class="px-5 py-4 border border-gray-300">
                    <input type="number" name="costs[]" class="w-full p-2 border border-gray-300 rounded" oninput="calculateTotal()" required>
                </td>
                <td class="px-5 py-4 border border-gray-300">
                    <button type="button" onclick="deleteRow(this)" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;

            table.appendChild(newRow);
        }

        function deleteRow(btn) {
            const row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
            calculateTotal();
        }

        function calculateTotal() {
            const costInputs = document.querySelectorAll('input[name="costs[]"]');
            let total = 0;
            costInputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('total-cost').textContent = total.toFixed(2);
        }
    </script>
</x-app-layout>
