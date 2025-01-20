<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Supplier;
use App\Models\VehicleType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RecordsController extends Controller
{
    // Display a list of records
    public function index()
    {
        $records = Record::with(['supplier', 'vehicleType'])->paginate(10);
        $suppliers = Supplier::all();
        $vehicleTypes = VehicleType::all();

        return view('records.index', compact('records', 'suppliers', 'vehicleTypes'));
    }

    // Store a newly created record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'supplier' => 'required|exists:suppliers,id',
            'vehicle_type' => 'required|exists:vehicle_types,id',
            'color' => 'required|string|max:255',
            'plate_no' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'rate_type' => 'required',
            'no_of_days' => 'required|string|max:255',

            'delivery_date' => 'required|date',
            'delivery_time' => 'required|date_format:H:i',
        ]);

        Record::create([
            'date' => $validated['date'],
            'supplier_id' => $validated['supplier'],
            'vehicle_type_id' => $validated['vehicle_type'],
            'color' => $validated['color'],
            'plate_no' => $validated['plate_no'],
            'rate' => $validated['rate'],
            'extendable' => isset($validated['is_extendable']) ? 'yes' : 'no',
            'tax_type' => $validated['rate_type'],
            'no_of_days' => $validated['no_of_days'],
            'delivery_date' => $validated['delivery_date'],
            'delivery_time' => $validated['delivery_time'],
        ]);

        return response()->json(['success' => true, 'message' => 'Record added successfully!']);
    }
    // Show the form for editing a record
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $vehicleTypes = VehicleType::all();
        $record = Record::findOrFail($id);
        return response()->json([
            'record' => $record,
            'suppliers' => $suppliers,
            'vehicleTypes' => $vehicleTypes,
            'supplier_id' => $record->supplier_id,
            'vehicle_type_id' => $record->vehicle_type_id,
        ]);

    }

    // Update a record
    public function update(Request $request, $record)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'supplier' => 'required|exists:suppliers,id',
            'vehicle_type' => 'required|exists:vehicle_types,id',
            'color' => 'required|string|max:255',
            'plate_no' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'rate_type' => 'required',
            'no_of_days' => 'required|string|max:255',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required',
        ]);
        $record = Record::findOrFail($record);
        $record->update([
            'date' => $validated['date'],
            'supplier_id' => $validated['supplier'],
            'vehicle_type_id' => $validated['vehicle_type'],
            'color' => $validated['color'],
            'plate_no' => $validated['plate_no'],
            'rate' => $validated['rate'],
            'tax_type' => $validated['rate_type'],
            'no_of_days' => $validated['no_of_days'],
            'delivery_date' => $validated['delivery_date'],
            'delivery_time' => $validated['delivery_time'],
        ]);

        return response()->json(['success' => true, 'message' => 'Record updated successfully!']);
    }

    // Delete a record
    public function destroy($record)
    {
        $record = Record::findOrFail($record);
        $record->delete();

        return response()->json(['success' => true, 'message' => 'Record deleted successfully!']);
    }
    public function generatePdfLPO($id)
    {
        // Fetch the record by ID
        $record = Record::with(['supplier', 'vehicleType'])->findOrFail($id);
        $fileName = 'PDF-LPO-' . Str::random(10) . '.pdf';
        $filePath =  $fileName;
        // Generate the PDF

    $pdf = PDF::loadView('pdf-view', compact('record'))
    ->setPaper('a4', orientation: 'portrait')
    ->setOption('isHtml5ParserEnabled', true)
    ->setOption('isPhpEnabled', true)
    ->setOption('scale', 0.9);  // Scale down content if necessary
    $pdf->save($filePath);
     return response()->download($filePath, $fileName);
// Return the PDF as a downloadable file
    }
    public function generatePDFWithoutLogo($id)
    {
        // Fetch the record by ID
        $record = Record::with(['supplier', 'vehicleType'])->findOrFail($id);
        $fileName = 'LPO-' . Str::random(10) . '.pdf';
        $filePath =  $fileName;
        // Generate the PDF

    $pdf = PDF::loadView('pdf-wo-logo', compact('record'))
    ->setPaper('a4', orientation: 'portrait')
    ->setOption('isHtml5ParserEnabled', true)
    ->setOption('isPhpEnabled', true)
    ->setOption('scale', 0.9);  // Scale down content if necessary
    $pdf->save($filePath);
     return response()->download($filePath, $fileName);
// Return the PDF as a downloadable file
    }
}
