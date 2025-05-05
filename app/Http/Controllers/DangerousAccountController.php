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

    public function cekIdForm()
    {
        return view('cek_id');
    }

    public function cekIdSubmit(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $inputId = $request->input('id');
        $dangerousAccount = DangerousAccount::where('ml_id', $inputId)->first();

        return view('cek_id', [
            'inputId' => $inputId,
            'dangerousAccount' => $dangerousAccount,
        ]);
    }

    public function index(Request $request)
    {
        $sortableFields = [
            'ml_id',
            'server_id',
            'pelaku_nickname',
            'korban_nickname',
            'tanggal_kejadian',
        ];

        $sortBy = $request->query('sort_by');
        $sortOrder = $request->query('sort_order', 'asc');

        if (!in_array($sortBy, $sortableFields)) {
            $sortBy = 'tanggal_kejadian';
        }

        if (!in_array(strtolower($sortOrder), ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        $dangerousAccounts = DangerousAccount::orderBy($sortBy, $sortOrder)->get();

        return view('kasus', [
            'dangerousAccounts' => $dangerousAccounts,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);
    }

    // Admin methods

    public function adminIndex(Request $request)
    {
        $sortableFields = [
            'ml_id',
            'server_id',
            'pelaku_nickname',
            'korban_nickname',
            'tanggal_kejadian',
        ];

        $sortBy = $request->query('sort_by');
        $sortOrder = $request->query('sort_order', 'asc');

        if (!in_array($sortBy, $sortableFields)) {
            $sortBy = 'tanggal_kejadian';
        }

        if (!in_array(strtolower($sortOrder), ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        $dangerousAccounts = DangerousAccount::orderBy($sortBy, $sortOrder)->get();

        return view('admin.dangerous_accounts.index', [
            'dangerousAccounts' => $dangerousAccounts,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function adminCreate()
    {
        return view('admin.dangerous_accounts.create');
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'ml_id' => 'required',
            'bukti_kasus' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            $buktiPath = null;
            if ($request->hasFile('bukti_kasus')) {
                $file = $request->file('bukti_kasus');
                $buktiPath = $file->store('bukti', 'public');
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
            return redirect()->back()->withErrors(['upload_error' => 'Error uploading file: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('admin.dangerous_accounts.index')->with('success', 'Dangerous account created successfully!');
    }

    public function adminEdit($id)
    {
        $dangerousAccount = DangerousAccount::findOrFail($id);
        return view('admin.dangerous_accounts.edit', compact('dangerousAccount'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $dangerousAccount = DangerousAccount::findOrFail($id);

        $request->validate([
            'ml_id' => 'required',
            'bukti_kasus' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            $buktiPath = $dangerousAccount->bukti_file_path;
            if ($request->hasFile('bukti_kasus')) {
                $file = $request->file('bukti_kasus');
                $buktiPath = $file->store('bukti', 'public');
            }

            $dangerousAccount->update([
                'ml_id' => $request->ml_id,
                'server_id' => $request->server_id,
                'pelaku_nickname' => $request->pelaku_nickname,
                'korban_nickname' => $request->korban_nickname,
                'tanggal_kejadian' => $request->tanggal_kejadian,
                'bukti_file_path' => $buktiPath,
                'kronologi' => $request->kronologi,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['upload_error' => 'Error uploading file: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('admin.dangerous_accounts.index')->with('success', 'Dangerous account updated successfully!');
    }

    public function adminDestroy($id)
    {
        $dangerousAccount = DangerousAccount::findOrFail($id);
        $dangerousAccount->delete();

        return redirect()->route('admin.dangerous_accounts.index')->with('success', 'Dangerous account deleted successfully!');
    }
}
