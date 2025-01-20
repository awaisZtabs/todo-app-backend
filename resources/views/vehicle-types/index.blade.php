@extends('layouts.app_with_sidebar')

@section('content')
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Vehicle Types</h1>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Manage Vehicle Types</h3>
            <button
                onclick="openCreateModal()"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg mb-4">
                + Add New Vehicle Type
            </button>

            <!-- Vehicle Types Table -->
            <table class="min-w-full border-collapse border border-gray-300 text-sm mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border border-gray-300 text-left">ID</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Name</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicleTypes as $vehicleType)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $vehicleType->id }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $vehicleType->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <button onclick="openEditModal({{ $vehicleType->id }}, '{{ $vehicleType->name }}')" class="text-blue-500 hover:underline">Edit</button>

                                <button onclick="deleteVehicleType({{ $vehicleType->id }})" class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Vehicle Type Modal -->
    <div id="createModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h3 class="text-lg font-semibold mb-4">Add New Vehicle Type</h3>
            <form id="createVehicleTypeForm">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Vehicle Type Name</label>
                    <input type="text" name="name" id="createVehicleTypeName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeCreateModal()" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Vehicle Type Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h3 class="text-lg font-semibold mb-4">Edit Vehicle Type</h3>
            <form id="editVehicleTypeForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editVehicleTypeId">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Vehicle Type Name</label>
                    <input type="text" name="name" id="editVehicleTypeName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }

    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }

    function openEditModal(id, name) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editVehicleTypeId').value = id;
        document.getElementById('editVehicleTypeName').value = name;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Handle Create Vehicle Type Form Submission
    document.getElementById('createVehicleTypeForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('createVehicleTypeName').value;

        fetch("{{ route('vehicle-types.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ name })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            }
        });
    });

    // Handle Delete Vehicle Type
    function deleteVehicleType(vehicleTypeId) {
        if (confirm('Are you sure you want to delete this vehicle type?')) {
            fetch(`/vehicle-types/${vehicleTypeId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                }
            });
        }
    }

    // Handle Edit Vehicle Type Form Submission
    document.getElementById('editVehicleTypeForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const id = document.getElementById('editVehicleTypeId').value;
        const name = document.getElementById('editVehicleTypeName').value;

        fetch(`/vehicle-types/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ name })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            }
        });
    });
</script>
@endpush
