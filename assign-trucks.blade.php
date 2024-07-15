<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <!-- Search Form -->
        <form action="{{ route('search-tables') }}" method="GET" class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <!-- Search Bar for Users -->
                <div class="flex-1 mr-4">
                    <input type="text" name="user_search" placeholder="Search User by ID" class="px-3 py-2 border border-gray-300 rounded-l-md w-full">
                </div>
                <!-- Search Button -->
                <div>
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                        Search
                    </button>
                </div>
            </div>
        </form>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- User Table -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Users</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Select</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($users->count() > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <input type="radio" name="selected_user" value="{{ $user->id }}" class="form-radio">
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $user->role }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-no-wrap text-center">No users found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Truck Table -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Trucks</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Select</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Make</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Model</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($trucks->count() > 0)
                                @foreach ($trucks as $truck)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <input type="radio" name="selected_truck" value="{{ $truck->id }}" class="form-radio">
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->plate_number }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->make }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $truck->model }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-no-wrap text-center">No trucks found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Assign Button -->
            <div class="flex justify-end mt-4">
                <form action="{{ route('assign-trucks') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="selected_user_id">
                    <input type="hidden" name="truck_id" id="selected_truck_id">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black px-4 py-2 rounded-lg shadow-md transition duration-200">Assign</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Update hidden inputs when radio buttons are selected
    document.querySelectorAll('input[name="selected_user"]').forEach((radio) => {
        radio.addEventListener('change', (event) => {
            document.getElementById('selected_user_id').value = event.target.value;
        });
    });

    document.querySelectorAll('input[name="selected_truck"]').forEach((radio) => {
        radio.addEventListener('change', (event) => {
            document.getElementById('selected_truck_id').value = event.target.value;
        });
    });
</script>
