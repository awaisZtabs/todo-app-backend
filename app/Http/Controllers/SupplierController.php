<?php
namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Display all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // Store a newly created supplier in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name',
        ]);

        Supplier::create($request->only('name'));

        return response()->json(['success' => true, 'message' => 'Supplier added successfully!']);
    }

    // Update the supplier in the database
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name,' . $supplier->id,
        ]);

        $supplier->update($request->only('name'));

        return response()->json(['success' => true, 'message' => 'Supplier updated successfully!']);
    }

    // Remove the supplier from the database
    public function destroy($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
            return response()->json(['success' => true, 'message' => 'Supplier deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete the supplier.']);
        }
    }
}
