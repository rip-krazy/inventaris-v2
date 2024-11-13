<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApprovalController extends Controller
{
    public function index()
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        return view('admin.approvals.index', compact('pendingApprovals'));
    }

    // Menyetujui permintaan
    public function approve($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        
        if (isset($pendingApprovals[$index])) {
            // Mengubah status menjadi 'Approved'
            $pendingApprovals[$index]['status'] = 'Approved';
            // Menambahkan data yang disetujui ke session pengembalian
            $approvedPengembalian = $pendingApprovals[$index];

            // Mengambil data pengembalian yang sudah ada, jika ada, dan menambahkannya
            $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
            $pengembalianTertunda[] = $approvedPengembalian;

            // Menyimpan kembali data ke session
            Session::put('pending_approvals', $pendingApprovals);
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
        }

        return redirect()->route('approvals.index')->with('status', 'success')->with('message', 'Permintaan telah disetujui!');
    }

    // Menolak permintaan
    public function reject($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        
        if (isset($pendingApprovals[$index])) {
            $pendingApprovals[$index]['status'] = 'Rejected';
        }

        // Menyimpan kembali data yang telah diperbarui ke session
        Session::put('pending_approvals', $pendingApprovals);

        return redirect()->route('approvals.index')->with('status', 'failed')->with('message', 'Permintaan telah ditolak!');
    }
}
