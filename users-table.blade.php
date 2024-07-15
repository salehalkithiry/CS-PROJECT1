<x-app-layout>
    <div class="py-6 flex justify-center">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 text-center">Users Table</h2>
                    <div class="mb-4 flex justify-between">
                        <form action="{{ route('users-index') }}" method="GET">
                            <input type="text" name="search" id="search" class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Search by User ID">
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-indigo-600">Search</button>
                        </form>
                        <a href="{{ route('dashboard') }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Back to Dashboard</a>
                    </div>
                    <table class="min-w-full leading-normal border-collapse table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <th class="px-5 py-3 border border-gray-300">ID</th>
                                <th class="px-5 py-3 border border-gray-300">Name</th>
                                <th class="px-5 py-3 border border-gray-300">Email</th>
                                <th class="px-5 py-3 border border-gray-300">Role</th>
                                <th class="px-5 py-3 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-5 py-4 border border-gray-300">{{ $user->id }}</td>
                                    <td class="px-5 py-4 border border-gray-300">{{ $user->name }}</td>
                                    <td class="px-5 py-4 border border-gray-300">{{ $user->email }}</td>
                                    <td class="px-5 py-4 border border-gray-300">{{ $user->role }}</td>
                                    <td class="px-5 py-4 border border-gray-300">
                                        <a href="{{ route('user-edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>
                                        <form action="{{ route('user-delete', $user->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
