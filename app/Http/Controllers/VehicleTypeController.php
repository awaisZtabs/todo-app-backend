<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    // Display all vehicle types
    public function index()
    {
        $vehicleTypes = VehicleType::all();
        return view('vehicle-types.index', compact('vehicleTypes'));
    }

    // Show the form for creating a new vehicle type
    public function create()
    {
        return view('vehicle-types.create');
    }

    // Store a newly created vehicle type in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:vehicle_types,name',
        ]);

        VehicleType::create($request->only('name'));

        return response()->json(['success' => true, 'message' => 'Vehicle Type added successfully!']);
    }

    // Show the form for editing an existing vehicle type
    public function edit(VehicleType $vehicleType)
    {
        return view('vehicle-types.edit', compact('vehicleType'));
    }

    // Update the vehicle type in the database
    public function update(Request $request, VehicleType $vehicleType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:vehicle_types,name,' . $vehicleType->id,
        ]);

        $vehicleType->update($request->only('name'));

        return response()->json(['success' => true, 'message' => 'Vehicle Type updated successfully!']);
    }

    // Remove the vehicle type from the database
    public function destroy($id)
    {
        try {
        $vehicleType =     VehicleType::findOrFail($id);
            $vehicleType->delete();
            return response()->json(['success' => true, 'message' => 'Vehicle Type deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete the Vehicle Type.']);
        }
    }
}
