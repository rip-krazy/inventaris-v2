<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\History; // Add this line
use Illuminate\Support\Facades\Auth; // Also make sure Auth is imported
use App\Models\Peminjaman;
use App\Models\Barang;

class ApprovalController extends Controller
{
    // Menampilkan daftar pending approvals
    public function index()
    {
        // Ambil pending approvals dari session
        $pendingApprovals = Session::get('pending_approvals', []);
    
        // Menambahkan nama barang atau ruang berdasarkan ID
        foreach ($pendingApprovals as &$entry) {
            if (isset($entry['jenis'])) {
                if ($entry['jenis'] == 'barang') {
                    // Ambil nama barang berdasarkan ID barang
                    $barang = Barang::find($entry['barangtempat']);
                    $entry['barangTempat'] = $barang ? $barang->nama_barang : 'Barang Tidak Ditemukan';
                } elseif ($entry['jenis'] == 'ruang') {
                    // Ambil nama ruang berdasarkan ID ruang
                    $ruang = Ruang::find($entry['ruangtempat']);
                    $entry['barangTempat'] = $ruang ? $ruang->name : 'Ruang Tidak Ditemukan';
                }
            }
        }
    
        // Mengembalikan data ke view
        return view('admin.approvals.index', compact('pendingApprovals'));
    }
    
    

    // Menyetujui permintaan
    public function approve($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
    
        if (isset($pendingApprovals[$index])) {
            $approvedPengembalian = $pendingApprovals[$index];
    
            if (isset($approvedPengembalian['id'])) {
                // Change status to 'Approved'
                $pendingApprovals[$index]['status'] = 'Approved';
    
                // Update the session
                Session::put('pending_approvals', $pendingApprovals);
    
                // Optionally, log the session data after the change
                \Log::debug("Updated pending approvals:", Session::get('pending_approvals'));
    
                // Log the action in the History table
                History::create([
                    'item_id' => $approvedPengembalian['id'],
                    'action' => 'approve',
                    'admin_id' => Auth::id(),
                    'notes' => "Permintaan dengan ID {$approvedPengembalian['id']} telah disetujui oleh admin.",
                ]);
            }
        }
    
        return redirect()->route('approvals.index')->with('status', 'success')->with('message', 'Permintaan telah disetujui!');
    }
    
    public function reject($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);
    
        if (isset($pendingApprovals[$index])) {
            $rejectedPengembalian = $pendingApprovals[$index];
    
            if (isset($rejectedPengembalian['id'])) {
                // Change status to 'Rejected'
                $pendingApprovals[$index]['status'] = 'Rejected';
    
                // Update the session
                Session::put('pending_approvals', $pendingApprovals);
    
                // Optionally, log the session data after the change
                \Log::debug("Updated pending approvals:", Session::get('pending_approvals'));
    
                // Log the action in the History table
                History::create([
                    'item_id' => $rejectedPengembalian['id'],
                    'action' => 'reject',
                    'admin_id' => Auth::id(),
                    'notes' => "Permintaan dengan ID {$rejectedPengembalian['id']} telah ditolak oleh admin.",
                ]);
            }
        }
    
        return redirect()->route('approvals.index')->with('status', 'failed')->with('message', 'Permintaan telah ditolak!');
    }
    
    
    
}
