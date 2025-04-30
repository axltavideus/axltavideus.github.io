<?php

namespace App\Http\Controllers;

use App\Models\DangerousAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DangerousAccountController extends Controller
{
    public function create()
    {
        return view('report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ml_id' => 'required',
            'bukti_kasus' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
        ]);

        try {
            $buktiPath = null;
            if ($request->hasFile('bukti_kasus')) {
                $file = $request->file('bukti_kasus');
                $buktiPath = $file->store('bukti', 'public');
                Log::info('File stored at: ' . $buktiPath);
            } else {
                Log::info('No file uploaded.');
            }

            DangerousAccount::create([
                'ml_id' => $request->ml_id,
                'server_id' => $request->server_id,
                'pelaku_nickname' => $request->pelaku_nickname,
                'korban_nickname' => $request->korban_nickname,
                'tanggal_kejadian' => $request->tanggal_kejadian,
                'bukti_file_path' => $buktiPath,
                'kronologi' => $request->kronologi,
            ]);
        } catch (\Exception $e) {
            Log::error('Error uploading file: ' . $e->getMessage());
            return redirect()->back()->withErrors(['upload_error' => 'Error uploading file: ' . $e->getMessage()])->withInput();
        }

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
