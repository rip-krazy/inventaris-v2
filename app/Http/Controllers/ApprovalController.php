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
    $pendingApprovals = Session::get('pending_approvals', []);
    if (isset($pendingApprovals[$index])) {
        $pendingApprovals[$index]['status'] = 'Approved';
        unset($pendingApprovals[$index]);
        Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index array
    }

    return redirect()->route('pending')->with('status', 'Berhasil')->with('message', 'Permintaan telah disetujui!');
}

public function reject($index)
{
    $pendingApprovals = Session::get('pending_approvals', []);
    if (isset($pendingApprovals[$index])) {
        $pendingApprovals[$index]['status'] = 'Rejected';
        unset($pendingApprovals[$index]);
        Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index array
    }

    return redirect()->route('pending')->with('status', 'Gagal')->with('message', 'Permintaan telah ditolak!');
}

}


