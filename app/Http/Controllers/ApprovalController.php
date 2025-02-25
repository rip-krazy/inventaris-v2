<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang; // Import the Barang model
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApprovalController extends Controller
{
    public function index()
    {
        $pendingApprovals = Session::get('pending_approvals', []);
    
        foreach ($pendingApprovals as $key => $approval) {
            if (!empty($approval['barangTempat']) && is_numeric($approval['barangTempat'])) {
                $barang = Barang::find($approval['barangTempat']);
                $pendingApprovals[$key]['barangTempat'] = $barang ? $barang->nama_barang : "Barang Tidak Ditemukan";
            }
            if (!empty($approval['ruangTempat']) && is_numeric($approval['ruangTempat'])) {
                $ruang = Ruang::find($approval['ruangTempat']);
                $pendingApprovals[$key]['ruangTempat'] = $ruang ? $ruang->name : "Ruang Tidak Ditemukan";
            }
            // Pastikan nama ruangan ditampilkan
            if (!empty($approval['ruangNama'])) {
                $pendingApprovals[$key]['ruangNama'] = $approval['ruangNama'];
            }
        }

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