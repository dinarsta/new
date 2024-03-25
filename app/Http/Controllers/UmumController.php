<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umum;
use App\Models\Poly;
use App\Models\Dokter;

class UmumController extends Controller
{
    public function index()
    {
        $data = Umum::all();
        // dd($data);

        return view('tampilumum', compact('data'));
    }

    public function checkNorm(Request $request)
    {
        // Your logic to check the BPJS number and fetch data from the database
        $normNumber = $request->input('norm');
        $patientData = Umum::where('norm', $normNumber)->first();

        if ($patientData) {
            // If patient data is found, return a response with the data
            return response()->json(['patientData' => $patientData]);
        } else {
            // If no data is found, return a response indicating that
            return response()->json(['message' => 'Patient data not found']);
        }
    }

    public function showSelectForm(Request $request)
    {
        $umumEntries = Umum::all();
        $polies = Poly::all();
        $dokters = Dokter::all();

        // Get the 'id' parameter from the URL
        $umumEntryId = $request->input('id');

        // Fetch the corresponding Umum entry from the database
        $umumEntry = Umum::find($umumEntryId);

        return view('selectumum', compact('umumEntries', 'polies', 'dokters', 'umumEntry'));
    }


    public function handleSelectionumum(Request $request, $id)
    {
        // Validate the form data as needed
        $request->validate([
            'selected_poli_id' => 'required|exists:polies,id',
            'selected_dokter_id' => 'required|exists:dokters,id',
            // Add other validation rules as needed
        ]);

        // Find the Umum entry by ID
        $umumEntry = Umum::find($id);

        if (!$umumEntry) {
            return redirect()->back()->with('error', 'Umum entry not found');
        }

        // Update the selected poly and dokter for the Umum entry
        $umumEntry->selected_poli_id = $request->input('selected_poli_id'); // Update this line
        $umumEntry->selected_dokter_id = $request->input('selected_dokter_id');

        // Save changes to the database
        $umumEntry->save();

        return redirect()->back()->with('success', 'Simpan Data Berhasil!');
    }
    public function cetakumum($id)
    {
        // Find the BPJS entry by ID
        $umumEntries = Umum::find($id);

        if (!$umumEntries) {
            return redirect()->back()->with('error', 'BPJS entry not found');
        }

        // You can pass $bpjsEntry to the print view if needed
        return view('cetakumum', compact('umumEntries'));
    }
}
