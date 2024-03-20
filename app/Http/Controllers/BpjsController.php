<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bpjs;
use App\Models\Poly;
use App\Models\Dokter;

class BpjsController extends Controller
{
    public function viewHome()
    {
        return view('home');
    }

    public function index()
    {
        $data = Bpjs::all();
        // dd($data);

        return view('tampilbpjs', compact('data'));
    }

    public function checkBpjs(Request $request)
    {
        // Your logic to check the BPJS number and fetch data from the database
        $bpjsNumber = $request->input('nomor_bpjs');
        $patientData = Bpjs::where('no_bpjs', $bpjsNumber)->first();

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
        $bpjsEntries = Bpjs::all();
        $polies = Poly::all();
        $dokters = Dokter::all();

        // Get the 'id' parameter from the URL
        $bpjsEntryId = $request->input('id');

        // Fetch the corresponding Bpjs entry from the database
        $bpjsEntry = Bpjs::find($bpjsEntryId);

        return view('select', compact('bpjsEntries', 'polies', 'dokters', 'bpjsEntry'));
    }

    public function handleSelection(Request $request, $id)
    {
        // Validate the form data as needed
        $request->validate([
            'selected_poli_id' => 'required|exists:polies,id',
            'selected_dokter_id' => 'required|exists:dokters,id',
            // Add other validation rules as needed
        ]);

        // Find the BPJS entry by ID
        $bpjsEntry = Bpjs::find($id);

        if (!$bpjsEntry) {
            return redirect()->back()->with('error', 'BPJS entry not found');
        }

        // Update the selected poly and dokter for the BPJS entry
        $bpjsEntry->selected_poli_id = $request->input('selected_poli_id'); // Update this line
        $bpjsEntry->selected_dokter_id = $request->input('selected_dokter_id');

        // Save changes to the database
        $bpjsEntry->save();

        return redirect()->back()->with('success', 'Simpan Data Berhasil!');

    }


    public function print($id)
    {
        // Find the BPJS entry by ID
        $bpjsEntry = Bpjs::find($id);

        if (!$bpjsEntry) {
            return redirect()->back()->with('error', 'BPJS entry not found');
        }

        // You can pass $bpjsEntry to the print view if needed
        return view('print', compact('bpjsEntry'));
    }


    public function cetak($id)
    {
        // Find the BPJS entry by ID
        $bpjsEntry = Bpjs::find($id);

        if (!$bpjsEntry) {
            return redirect()->back()->with('error', 'BPJS entry not found');
        }

        // You can pass $bpjsEntry to the print view if needed
        return view('cetak', compact('bpjsEntry'));
    }

    public function sep($id)
    {
        // Find the BPJS entry by ID
        $bpjsEntry = Bpjs::find($id);

        if (!$bpjsEntry) {
            return redirect()->back()->with('error', 'BPJS entry not found');
        }

        // You can pass $bpjsEntry to the print view if needed
        return view('sep', compact('bpjsEntry'));
    }

    public function label($id)
    {
        // Find the BPJS entry by ID
        $bpjsEntry = Bpjs::find($id);

        if (!$bpjsEntry) {
            return redirect()->back()->with('error', 'BPJS entry not found');
        }

        // You can pass $bpjsEntry to the print view if needed
        return view('label', compact('bpjsEntry'));
    }
}
