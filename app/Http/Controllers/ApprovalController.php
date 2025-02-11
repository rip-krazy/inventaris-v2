<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApprovalController extends Controller
{
   // Controller ApprovalController
public function index()
{
    // Menarik pending approvals dari session
    $pendingApprovals = Session::get('pending_approvals', []);

    // Kirim ke view dengan nama variabel yang tepat
    return view('admin.approvals.index', compact('pendingApprovals'));
}


    // Menyetujui permintaan
    public function approve($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        
        if (isset($pendingApprovals[$index])) {
            // Mengubah status menjadi 'Approved'
            $pendingApprovals[$index]['status'] = 'Approved';
            $approvedPengembalian = $pendingApprovals[$index];

            // Menyimpan ke session pengembalian yang disetujui
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
            // Mengubah status menjadi 'Rejected'
            $pendingApprovals[$index]['status'] = 'Rejected';

        }

        // Menyimpan kembali data yang telah diperbarui ke session
        Session::put('pending_approvals', $pendingApprovals);

        return redirect()->route('approvals.index')->with('status', 'failed')->with('message', 'Permintaan telah ditolak!');
    }
}
