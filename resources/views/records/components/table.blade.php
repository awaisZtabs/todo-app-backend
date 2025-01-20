<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full border-collapse border border-gray-300 text-sm">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="px-6 py-3 text-left font-semibold">{{ __('ID') }}</th>
                <th class="px-6 py-3 text-left font-semibold">{{ __('Name') }}</th>
                <th class="px-6 py-3 text-left font-semibold">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <!-- Example Records -->
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-3 text-gray-800">1</td>
                <td class="px-6 py-3 text-gray-800">John Doe</td>
                <td class="px-6 py-3">
                    <button class="text-blue-500 hover:text-blue-700 transition font-medium">Edit</button>
                    <button class="ml-4 text-red-500 hover:text-red-700 transition font-medium">Delete</button>
                </td>
            </tr>
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-3 text-gray-800">2</td>
                <td class="px-6 py-3 text-gray-800">Jane Smith</td>
                <td class="px-6 py-3">
                    <button class="text-blue-500 hover:text-blue-700 transition font-medium">Edit</button>
                    <button class="ml-4 text-red-500 hover:text-red-700 transition font-medium">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
