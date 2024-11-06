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
        // Retrieve pending approvals from the session
        $pendingApprovals = Session::get('pending_approvals', []);

        // Check if the item exists
        if (isset($pendingApprovals[$index])) {
            // Mark the item as approved
            $pendingApprovals[$index]['status'] = 'Approved';

            // Optionally, remove the item from the pending list
            unset($pendingApprovals[$index]);

            // Update the session with the modified list
            Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index array
        }

        // Redirect back to the approvals page with a success message
        return redirect()->route('approvals.index')->with('message', 'Permintaan telah disetujui!');
    }

    /**
     * Reject a pending item.
     *
     * @param int $index
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject($index)
    {
        // Retrieve pending approvals from the session
        $pendingApprovals = Session::get('pending_approvals', []);

        // Check if the item exists
        if (isset($pendingApprovals[$index])) {
            // Mark the item as rejected
            $pendingApprovals[$index]['status'] = 'Rejected';

            // Optionally, remove the item from the pending list
            unset($pendingApprovals[$index]);

            // Update the session with the modified list
            Session::put('pending_approvals', array_values($pendingApprovals)); // Re-index array
        }

        // Redirect back to the approvals page with a rejection message
        return redirect()->route('approvals.index')->with('message', 'Permintaan telah ditolak.');
    }
}


