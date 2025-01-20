@extends('layouts.app_with_sidebar')

@section('content')
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Records List</h1>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Manage Records</h3>
            <button
                onclick="openCreateModal()"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg mb-4">
                + Add New Record
            </button>

            <!-- Records Table -->
            <table class="min-w-full border-collapse border border-gray-300 text-sm mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border border-gray-300 text-left">ID</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Date</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Supplier</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Vehicle Type</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Color</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Plate No</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Rate</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">No of Days</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Delivery Date</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Delivery Time</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->id }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->date }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->supplier->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->vehicleType->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->color }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->plate_no }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->rate }} ({{ $record->tax_type }})</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->no_of_days }} {{$record->extendable == 'yes' ? 'Extendable' : ''   }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->delivery_date }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->delivery_time }}</td>
                            <td class="px-4 py-2 border border-gray-300 relative">
                                <!-- 3-Dot Menu Button -->
                                <button
                                    onclick="toggleDropdown({{ $record->id }})"
                                    class="text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-full p-2 shadow-sm focus:outline-none focus:ring focus:ring-gray-300 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5h.01M12 12h.01M12 19h.01" />
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div id="dropdown-{{ $record->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                                    <button onclick="openEditModal({{ $record->id }})"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L6 11.172V14h2.828l8.586-8.586a2 2 0 000-2.828zM5 12.414V15h2.586l1-1H6v-1.586L5 12.414z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button onclick="window.location.href='{{ route('records.generatePdf', $record->id) }}'"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm3 2h6v2H7V4z" />
                                    </svg>
                                    Download PDF LPO
                                </button>
                                <button onclick="window.location.href='{{ route('records.generatePDFWithoutLogo', $record->id) }}'"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h2v3h6v-3h2a3 3 0 003-3V7a3 3 0 00-3-3H5zm1 2h8a1 1 0 010 2H6a1 1 0 110-2zm0 4h8a1 1 0 010 2H6a1 1 0 110-2z" />
                                        </svg>
                                        Print LPO
                                    </button>
                                    <button onclick="deleteRecord({{ $record->id }})"
                                        class="flex items-center px-4 py-2 text-sm text-red-500 hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 4a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6zm2 5a1 1 0 112 0v5a1 1 0 11-2 0V9zm4 0a1 1 0 112 0v5a1 1 0 11-2 0V9z" clip-rule="evenodd" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- Pagination Links -->
    <div class="mt-4">
        {{ $records->links() }}
    </div>
        </div>
    </div>

    <!-- Create Record Modal -->
   <!-- Create Record Modal -->
<div id="createModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-2/3">
        <h3 class="text-lg font-semibold mb-4">Add New Record</h3>
        <form id="createRecordForm">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <!-- Date -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="createDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Supplier Dropdown -->
                <div>
                    <label for="supplier" class="block text-sm font-medium text-gray-700">Supplier</label>
                    <select name="supplier" id="createSupplier" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Vehicle Type Dropdown -->
                <div>
                    <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                    <select name="vehicle_type" id="createVehicleType" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Vehicle Type</option>
                        @foreach ($vehicleTypes as $vehicleType)
                            <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" name="color" id="createColor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Plate Number -->
                <div>
                    <label for="plate_no" class="block text-sm font-medium text-gray-700">Plate No</label>
                    <input type="text" name="plate_no" id="createPlateNo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Rate -->
                <div>
                    <label for="rate" class="block text-sm font-medium text-gray-700">Rate</label>
                    <input type="number" name="rate" id="createRate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Rate Type Radio Buttons -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Rate Type</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="rate_type" value="INCLUDED TAX" class="mr-2" required>
                            INCLUDED TAX
                        </label>
                        <label class="inline-flex items-center ml-4">
                            <input type="radio" name="rate_type" value="VAT" class="mr-2" required>
                            VAT
                        </label>
                    </div>
                </div>

                <!-- No of Days -->
                <div>
                    <label for="no_of_days" class="block text-sm font-medium text-gray-700">No of Days</label>
                    <input type="text" name="no_of_days" id="createNoOfDays" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Is Extendable Checkbox -->
                <div class="flex items-center mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_extendable" id="createIsExtendable" class="mr-2">
                        Is Extendable
                    </label>
                </div>

                <!-- Delivery Date -->
                <div>
                    <label for="delivery_date" class="block text-sm font-medium text-gray-700">Delivery Date</label>
                    <input type="date" name="delivery_date" id="createDeliveryDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Delivery Time -->
                <div>
                    <label for="delivery_time" class="block text-sm font-medium text-gray-700">Delivery Time</label>
                    <input type="time" name="delivery_time" id="createDeliveryTime" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end mt-6">
                <button type="button"
                        onclick="closeCreateModal()"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 mr-2">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Record Modal -->
<!-- Edit Record Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-2/3">
        <h3 class="text-lg font-semibold mb-4">Edit Record</h3>
        <form id="editRecordForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="editRecordId">

            <div class="grid grid-cols-2 gap-6">
                <!-- Date -->
                <div>
                    <label for="editDate" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="editDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Supplier Dropdown -->
                <div>
                    <label for="editSupplier" class="block text-sm font-medium text-gray-700">Supplier</label>
                    <select name="supplier" id="editSupplier" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Vehicle Type Dropdown -->
                <div>
                    <label for="editVehicleType" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                    <select name="vehicle_type" id="editVehicleType" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Vehicle Type</option>
                        @foreach ($vehicleTypes as $vehicleType)
                            <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Color -->
                <div>
                    <label for="editColor" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" name="color" id="editColor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Plate Number -->
                <div>
                    <label for="editPlateNo" class="block text-sm font-medium text-gray-700">Plate No</label>
                    <input type="text" name="plate_no" id="editPlateNo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Rate -->
                <div>
                    <label for="editRate" class="block text-sm font-medium text-gray-700">Rate</label>
                    <input type="number" name="rate" id="editRate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Rate Type -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Rate Type</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="edit_rate_type" value="INCLUDED TAX" required> INCLUDED TAX
                        </label>
                        <label class="inline-flex items-center ml-4">
                            <input type="radio" name="edit_rate_type" value="VAT" required> VAT
                        </label>
                    </div>
                </div>

                <!-- No of Days -->
                <div>
                    <label for="editNoOfDays" class="block text-sm font-medium text-gray-700">No of Days</label>
                    <input type="text" name="no_of_days" id="editNoOfDays" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Is Extendable Checkbox -->
                <div class="flex items-center mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_extendable" id="editIsExtendable" class="mr-2"> Is Extendable
                    </label>
                </div>

                <!-- Delivery Date -->
                <div>
                    <label for="editDeliveryDate" class="block text-sm font-medium text-gray-700">Delivery Date</label>
                    <input type="date" name="delivery_date" id="editDeliveryDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Delivery Time -->
                <div>
                    <label for="editDeliveryTime" class="block text-sm font-medium text-gray-700">Delivery Time</label>
                    <input type="time" name="delivery_time" id="editDeliveryTime" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 mr-2">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function toggleDropdown(recordId) {
    const dropdown = document.getElementById(`dropdown-${recordId}`);
    // Toggle visibility
    dropdown.classList.toggle('hidden');
    dropdown.classList.toggle('block');
}

// Close dropdown if clicked outside
document.addEventListener('click', function (event) {
    const dropdowns = document.querySelectorAll('[id^="dropdown-"]');
    dropdowns.forEach(dropdown => {
        if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
            dropdown.classList.add('hidden');
            dropdown.classList.remove('block');
        }
    });
});
function generatePDF(recordId) {
          window.open(`/records/pdf/${recordId}`, '_blank');
    }
    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }

    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }

    function openEditModal(id) {
    axios.get(`/records/${id}/edit`)
        .then(response => {
            const record = response.data.record;

            // Prefill modal fields with record data
            document.getElementById('editRecordId').value = record.id;
            document.getElementById('editDate').value = record.date;
            document.getElementById('editSupplier').value = record.supplier_id;
            document.getElementById('editVehicleType').value = record.vehicle_type_id;
            document.getElementById('editColor').value = record.color;
            document.getElementById('editPlateNo').value = record.plate_no;
            document.getElementById('editRate').value = record.rate;
            const radioButton = document.querySelector(`input[name="edit_rate_type"][value="${record.tax_type}"]`);
            console.log(radioButton);
            if (radioButton) {
                radioButton.checked = true;
            } else {
                console.error('Radio button not found for value:', record.tax_type);
            }
            document.getElementById('editNoOfDays').value = record.no_of_days;
            document.getElementById('editIsExtendable').checked = record.extendable;
            document.getElementById('editDeliveryDate').value = record.delivery_date;
            document.getElementById('editDeliveryTime').value = record.delivery_time;

            // Show the modal
            document.getElementById('editModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error fetching record data:', error);
            alert('Failed to load record data. Please try again.');
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}


    function deleteRecord(recordId) {
        if (confirm('Are you sure you want to delete this record?')) {
            fetch(`/record/${recordId}`, {
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
    document.getElementById('editRecordForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const id = document.getElementById('editRecordId').value; // Get the record ID
    const formData = {
        date: document.getElementById('editDate').value,
        supplier: document.getElementById('editSupplier').value,
        vehicle_type: document.getElementById('editVehicleType').value,
        color: document.getElementById('editColor').value,
        plate_no: document.getElementById('editPlateNo').value,
        rate: document.getElementById('editRate').value,
        rate_type: document.querySelector('input[name="edit_rate_type"]:checked').value,
        no_of_days: document.getElementById('editNoOfDays').value,
        is_extendable: document.getElementById('editIsExtendable').checked ? 1 : 0,
        delivery_date: document.getElementById('editDeliveryDate').value,
        delivery_time: document.getElementById('editDeliveryTime').value,
    };

    // Make an Axios PUT request to update the record
    axios.put(`/records/${id}`, formData)
        .then(response => {
            if (response.data.success) {
                alert(response.data.message);
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('Failed to update the record. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error updating record:', error.response);
            alert('An error occurred while updating the record.');
        });
});
    document.getElementById('createRecordForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Prepare form data
        const formData = {
            date: document.getElementById('createDate').value,
            supplier: document.getElementById('createSupplier').value,
            vehicle_type: document.getElementById('createVehicleType').value,
            color: document.getElementById('createColor').value,
            plate_no: document.getElementById('createPlateNo').value,
            rate: document.getElementById('createRate').value,
            rate_type: document.querySelector('input[name="rate_type"]:checked').value,
            no_of_days: document.getElementById('createNoOfDays').value,
            is_extendable: document.getElementById('createIsExtendable').checked ? 1 : 0,
            delivery_date: document.getElementById('createDeliveryDate').value,
            delivery_time: document.getElementById('createDeliveryTime').value,
        };

        // Axios POST request
        axios.post("{{ route('records.store') }}", formData)
            .then(response => {
                if (response.data.success) {
                    alert(response.data.message);
                    location.reload(); // Reload the page to show the new record
                } else {
                    alert('Failed to save the record. Please check your input.');
                }
            })
            .catch(error => {
                console.error('Error:', error.response);
                alert('An error occurred. Please try again.');
            });
    });

</script>
@endpush
