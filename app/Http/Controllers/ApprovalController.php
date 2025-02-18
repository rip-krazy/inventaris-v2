<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang; // Import the Barang model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApprovalController extends Controller
{
    public function index()
    {
        // Retrieve pending approvals from session
        $pendingApprovals = Session::get('pending_approvals', []);

        // Loop through each approval and replace barangTempat ID with actual name
        foreach ($pendingApprovals as $key => $approval) {
            if (isset($approval['barangTempat']) && is_numeric($approval['barangTempat'])) {
                // Find the corresponding item
                $barang = Barang::find($approval['barangTempat']);
                if ($barang) {
                    // Replace the ID with the actual name
                    $pendingApprovals[$key]['barangTempat'] = $barang->nama_barang;
                }
            }
        }

        // Send to view with the updated data
        return view('admin.approvals.index', compact('pendingApprovals'));
    }

    // Approve request
    public function approve($index)
{
    $pendingApprovals = Session::get('pending_approvals', []);
    
    if (isset($pendingApprovals[$index])) {
        // Ubah status menjadi "Approved"
        $approvedPengembalian = $pendingApprovals[$index];
        $approvedPengembalian['status'] = 'Approved';

        // Tambahkan ke pengembalian_tertunda session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        $pengembalianTertunda[] = $approvedPengembalian;

        // Hapus dari pending approvals
        unset($pendingApprovals[$index]);

        // Simpan perubahan session
        Session::put('pending_approvals', $pendingApprovals);
        Session::put('pengembalian_tertunda', $pengembalianTertunda);
    }

    return redirect()->route('approvals.index')->with('status', 'success')->with('message', 'Permintaan telah disetujui!');
}

public function reject($index)
{
    $pendingApprovals = Session::get('pending_approvals', []);
    
    if (isset($pendingApprovals[$index])) {
        // Hapus dari pending approvals
        unset($pendingApprovals[$index]);
    }

    // Simpan perubahan session
    Session::put('pending_approvals', $pendingApprovals);

    return redirect()->route('approvals.index')->with('status', 'failed')->with('message', 'Permintaan telah ditolak!');
}

}