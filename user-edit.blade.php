<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-2xl font-bold">Edit User</h2>
                    <a href="{{ route('users-table') }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-indigo-600">Back to Users Table</a>
                </div>

                <div class="p-6">
                    <form action="{{ route('user-update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="mechanic" {{ $user->role === 'mechanic' ? 'selected' : '' }}>Mechanic</option>
                                <option value="driver" {{ $user->role === 'driver' ? 'selected' : '' }}>Driver</option>
                                <!-- Add more options for other roles as needed -->
                            </select>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-indigo-600">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
