<x-app-layout>
    <div class="text-center mt-4">
        <!-- Button to go to view-trucks -->
        <a href="{{ route('view-trucks-mech') }}" class="inline-block bg-black text-red-500 px-6 py-3 rounded-lg shadow-md transition duration-200">Go to Trucks</a>
    </div>
    
    <div class="text-center mt-4">
        <!-- Button to view services -->
        <a href="{{ route('view-services-mech') }}" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-lg shadow-md transition duration-200">View Services</a>
    </div>
</x-app-layout>
