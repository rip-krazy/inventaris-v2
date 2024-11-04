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
            Session::put('pending_approvals', $pendingApprovals);
        }
        return redirect()->route('approvals.index');
    }

    public function reject($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        if (isset($pendingApprovals[$index])) {
            $pendingApprovals[$index]['status'] = 'Rejected';
            Session::put('pending_approvals', $pendingApprovals);
        }
        return redirect()->route('approvals.index');
    }
}
