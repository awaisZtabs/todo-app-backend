<div id="addRecordForm" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white shadow-md rounded-lg p-6 w-1/3">
        <h3 class="text-xl font-bold mb-4 text-gray-800">{{ __('Add New Record') }}</h3>
        <form>
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    {{ __('Name') }}
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Enter record name"
                    required
                >
            </div>
            <div class="flex justify-end">
                <button
                    type="button"
                    onclick="closeAddRecordForm()"
                    class="px-4 py-2 mr-3 bg-gray-400 text-white font-medium rounded-lg shadow hover:bg-gray-500 transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg shadow hover:bg-green-700 transition"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
