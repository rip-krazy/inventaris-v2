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
            // Mark as approved
            $pendingApprovals[$index]['status'] = 'Approved';
            // Optionally log the approval or do something else
        }
        // Remove the entry after approval
        unset($pendingApprovals[$index]);
        Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index the array
        Session::flash('notification', 'Request approved successfully!');
        return redirect()->route('approvals.index');
    }

    public function reject($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        if (isset($pendingApprovals[$index])) {
            // Mark as rejected
            $pendingApprovals[$index]['status'] = 'Rejected';
            // Optionally log the rejection or do something else
        }
        // Remove the entry after rejection
        unset($pendingApprovals[$index]);
        Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index the array
        Session::flash('notification', 'Request rejected successfully!');
        return redirect()->route('approvals.index');
    }
}
