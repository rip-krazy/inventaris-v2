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
          
          // Get the item ID (either barangTempat or ruangTempat)
          $itemId = null;
          if (!empty($rejectedItem['barangTempat']) && is_numeric($rejectedItem['barangTempat'])) {
              $itemId = $rejectedItem['barangTempat'];
              $barang = Barang::find($rejectedItem['barangTempat']);
              $barangTempat = $barang ? $barang->nama_barang : "Barang Tidak Ditemukan";
              $ruangTempat = null;
          } elseif (!empty($rejectedItem['ruangTempat']) && is_numeric($rejectedItem['ruangTempat'])) {
              $itemId = $rejectedItem['ruangTempat'];
              $ruang = Ruang::find($rejectedItem['ruangTempat']);
              $ruangTempat = $ruang ? $ruang->name : "Ruang Tidak Ditemukan";
              $barangTempat = null;
          } else {
              // Handle case when both are not numeric or not available
              $barangTempat = $rejectedItem['barangTempat'] ?? null;
              $ruangTempat = $rejectedItem['ruangTempat'] ?? null;
              $itemId = 0; // Default value when no proper ID is available
          }
          
          // Create new history record in database
          $history = new \App\Models\History();
          $history->name = $rejectedItem['name'];
          $history->mapel = $rejectedItem['mapel'] ?? null;
          $history->barang_tempat = $barangTempat;
          $history->ruang_tempat = $ruangTempat;
          $history->tanggal_pengembalian = now()->toDateString();
          $history->status = 'Rejected';
          $history->alasan = $alasan;
          $history->type = 'pengembalian';
          
          // Add required fields from migration
          $history->item_id = $itemId;
          $history->action = 'reject';
          $history->admin_id = auth()->id() ?? 1; // Use authenticated admin ID or default to 1
          $history->notes = 'Rejected: ' . $alasan;
          
          try {
              $history->save();
              \Log::info('Rejection saved to history database', [
                  'name' => $rejectedItem['name'],
                  'status' => 'Rejected'
              ]);
          } catch (\Exception $e) {
              \Log::error('Failed to save rejection to history: ' . $e->getMessage());
              return redirect()->route('approvals.index')
                  ->with('status', 'error')
                  ->with('message', 'Error saving rejection: ' . $e->getMessage());
          }
          
          // Remove from pending approvals
          unset($pendingApprovals[$index]);
          
          // Update session
          Session::put('pending_approvals', $pendingApprovals);
      }
  
      return redirect()->route('approvals.index')
          ->with('status', 'failed')
          ->with('message', 'Permintaan telah ditolak dan disimpan ke history!');
  }
}