<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="text-center">
            <!-- Button to go to users-table -->
            <a href="{{ route('users-table') }}" class="inline-block bg-black text-red-500 px-6 py-3 rounded-lg shadow-md transition duration-200">Go to Users Table</a>
        </div>
        <div class="text-center mt-4">
            <!-- Button to go to view-trucks -->
            <a href="{{ route('view-trucks') }}" class="inline-block bg-black text-red-500 px-6 py-3 rounded-lg shadow-md transition duration-200">Go to Trucks</a>
        </div>
        <div class="text-center mt-4">
            <!-- Button to go to assign-trucks -->
            <a href="{{ route('assigned-trucks') }}" class="inline-block bg-black text-red-500 px-6 py-3 rounded-lg shadow-md transition duration-200">Assign Trucks</a>
        </div>
    </div>
</x-app-layout>

