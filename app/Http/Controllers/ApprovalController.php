<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
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
            if (!empty($approval['ruangNama'])) {
                $pendingApprovals[$key]['ruangNama'] = $approval['ruangNama'];
            }
        }

        // Menghitung jumlah permintaan yang menunggu persetujuan
        $pendingCount = count($pendingApprovals);

        return view('admin.approvals.index', compact('pendingApprovals', 'pendingCount'));
    }

    public function approve($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
    
        if (isset($pendingApprovals[$index])) {
            // Ubah status menjadi "Approved"
            $approvedPengembalian = $pendingApprovals[$index];
            $approvedPengembalian['status'] = 'Approved';
            $approvedPengembalian['tanggal_pengembalian'] = now()->toDateString();
            
            // Make sure we're storing the correct property names consistently
            // Convert IDs to names if they're still numeric
            if (!empty($approvedPengembalian['barangTempat']) && is_numeric($approvedPengembalian['barangTempat'])) {
                $barang = Barang::find($approvedPengembalian['barangTempat']);
                $approvedPengembalian['barangTempat'] = $barang ? $barang->nama_barang : "Barang Tidak Ditemukan";
            }
            
            if (!empty($approvedPengembalian['ruangTempat']) && is_numeric($approvedPengembalian['ruangTempat'])) {
                $ruang = Ruang::find($approvedPengembalian['ruangTempat']);
                // Make sure we're using the correct column name (name or nama_ruang)
                $approvedPengembalian['ruangTempat'] = $ruang ? $ruang->name : "Ruang Tidak Ditemukan";
            }
    
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

  // Reject request in ApprovalController
public function reject(Request $request, $index)
{
    $pendingApprovals = Session::get('pending_approvals', []);
    $alasan = $request->input('alasan', 'Tidak ada alasan');

    if (isset($pendingApprovals[$index])) {
        $rejectedItem = $pendingApprovals[$index];
        
        // Convert IDs to names before storing in history
        if (!empty($rejectedItem['barangTempat']) && is_numeric($rejectedItem['barangTempat'])) {
            $barang = Barang::find($rejectedItem['barangTempat']);
            $rejectedItem['barangTempat'] = $barang ? $barang->nama_barang : "Barang Tidak Ditemukan";
        }
        
        if (!empty($rejectedItem['ruangTempat']) && is_numeric($rejectedItem['ruangTempat'])) {
            $ruang = Ruang::find($rejectedItem['ruangTempat']);
            $rejectedItem['ruangTempat'] = $ruang ? $ruang->name : "Ruang Tidak Ditemukan";
        }
        
        $rejectedItem['status'] = 'Rejected';
        $rejectedItem['alasan'] = $alasan;
        $rejectedItem['tanggal_pengembalian'] = now()->toDateString();

        // Simpan ke pengembalian_history untuk user dan admin view
        $pengembalianHistory = Session::get('pengembalian_history', []);
        $pengembalianHistory[] = $rejectedItem;
        
        // Hapus item dari pending approvals
        unset($pendingApprovals[$index]);

        // Update session
        Session::put('pending_approvals', $pendingApprovals);
        Session::put('pengembalian_history', $pengembalianHistory);
    }

    return redirect()->route('approvals.index')->with('status', 'failed')->with('message', 'Permintaan telah ditolak!');
}
}