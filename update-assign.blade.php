<!-- resources/views/update-assign.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Update Assignment</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div>
                    <p><strong>Assignment ID:</strong> {{ $assignment->id }}</p>
                    <p><strong>Truck Plate Number:</strong> {{ $assignment->plate_number }}</p>
                    <p><strong>Truck ID:</strong> {{ $assignment->truck_id }}</p>
                    <hr class="my-4">

                    <form action="{{ route('update-assignment', ['assignment' => $assignment->id]) }}" method="POST" id="updateAssignmentForm">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="user_search" class="block text-sm font-medium text-gray-700">Search User by ID</label>
                            <div class="flex">
                                <input type="text" name="user_search" id="user_search" placeholder="Enter User ID" class="form-input mt-1 block w-full">
                                <button type="button" id="searchUser" class="ml-2 bg-blue-500 hover:bg-blue-600 text-black px-4 py-2 rounded-lg shadow-md transition duration-200">Search</button>
                            </div>
                            <p id="userName" class="mt-2"></p>
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                            <select name="user_id" id="user_id" class="form-select mt-1 block w-full">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $assignment->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-red-600 text-black px-4 py-2 rounded-lg shadow-md transition duration-200">Update Assignment</button>
                            <a href="{{ route('assigned-trucks') }}" class="bg-indigo-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">Back to Assigned Trucks</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchUser').addEventListener('click', function() {
            var userId = document.getElementById('user_search').value;
            fetch('/search-user/' + userId)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('userName').textContent = data.error;
                        document.getElementById('user_id').value = '';
                    } else {
                        document.getElementById('userName').textContent = 'User: ' + data.name;
                        document.getElementById('user_id').value = data.id;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Ensure the user ID input is updated before form submission
        document.getElementById('updateAssignmentForm').addEventListener('submit', function(event) {
            var userId = document.getElementById('user_search').value;
            document.getElementById('user_id').value = userId;
        });
    </script>
</x-app-layout>
