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

    public function approve($index)
    {
        // Ambil data pending approvals dari session
        $pendingApprovals = Session::get('pending_approvals', []);

        if (isset($pendingApprovals[$index])) {
            // Tandai sebagai approved
            $pendingApprovals[$index]['status'] = 'Approved';
        }

        // Hapus entry yang sudah diapprove
        unset($pendingApprovals[$index]);

        // Simpan kembali ke session
        Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index array

        // Kirim feedback dalam bentuk JSON untuk ditampilkan di pending user
        return response()->json([
            'status' => 'Berhasil',
            'message' => 'Permintaan telah disetujui!',
            'pendingApprovals' => $pendingApprovals,
        ]);
    }

    public function reject($index)
    {
        // Ambil data pending approvals dari session
        $pendingApprovals = Session::get('pending_approvals', []);

        if (isset($pendingApprovals[$index])) {
            // Tandai sebagai rejected
            $pendingApprovals[$index]['status'] = 'Rejected';
        }

        // Hapus entry yang sudah ditolak
        unset($pendingApprovals[$index]);

        // Simpan kembali ke session
        Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index array

        // Kirim feedback dalam bentuk JSON untuk ditampilkan di pending user
        return response()->json([
            'status' => 'Gagal',
            'message' => 'Permintaan ditolak.',
            'pendingApprovals' => $pendingApprovals,
        ]);
    }
}


