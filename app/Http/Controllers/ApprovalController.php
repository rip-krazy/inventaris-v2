<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\History;

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
            
            // Make sure the time format is consistent
            if (!empty($approval['jamMulai']) && !empty($approval['jamSelesai'])) {
                // Convert to jam_dari and jam_sampai format if needed
                $pendingApprovals[$key]['jam_dari'] = $approval['jamMulai'];
                $pendingApprovals[$key]['jam_sampai'] = $approval['jamSelesai'];
            } elseif (!empty($approval['jam_dari']) && !empty($approval['jam_sampai'])) {
                // Already in the correct format
                continue;
            } elseif (!empty($approval['jam'])) {
                // Handle single time value if exists
                $pendingApprovals[$key]['jam_dari'] = $approval['jam'];
            }
        }

        $pendingCount = count($pendingApprovals);

        return view('admin.approvals.index', compact('pendingApprovals', 'pendingCount'));
    }

    public function approve($index)
    {
        $pendingApprovals = Session::get('pending_approvals', []);

        if (!isset($pendingApprovals[$index])) {
            return redirect()->route('approvals.index')->with('error', 'Data tidak ditemukan.');
        }

        $approvedPengembalian = $pendingApprovals[$index];
        $approvedPengembalian['status'] = 'Approved';
        $approvedPengembalian['tanggal_pengembalian'] = now()->toDateString();

        if (!empty($approvedPengembalian['barangTempat']) && is_numeric($approvedPengembalian['barangTempat'])) {
            $barang = Barang::find($approvedPengembalian['barangTempat']);
            $approvedPengembalian['barangTempat'] = $barang ? $barang->nama_barang : "Barang Tidak Ditemukan";
        }

        if (!empty($approvedPengembalian['ruangTempat']) && is_numeric($approvedPengembalian['ruangTempat'])) {
            $ruang = Ruang::find($approvedPengembalian['ruangTempat']);
            $approvedPengembalian['ruangTempat'] = $ruang ? $ruang->name : "Ruang Tidak Ditemukan";
        }

        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        $pengembalianTertunda[] = $approvedPengembalian;

        unset($pendingApprovals[$index]);

        Session::put('pending_approvals', $pendingApprovals);
        Session::put('pengembalian_tertunda', $pengembalianTertunda);

        return redirect()->route('approvals.index')->with('status', 'success')->with('message', 'Permintaan telah disetujui!');
    }

    public function reject(Request $request, $index)
    {
        $request->validate([
            'alasan' => 'required|string|max:255'
        ]);

        $pendingApprovals = Session::get('pending_approvals', []);
        $alasan = $request->input('alasan', 'Tidak ada alasan');

        if (!isset($pendingApprovals[$index])) {
            return redirect()->route('approvals.index')->with('error', 'Data tidak ditemukan.');
        }

        $rejectedItem = $pendingApprovals[$index];

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
            $barangTempat = $rejectedItem['barangTempat'] ?? null;
            $ruangTempat = $rejectedItem['ruangTempat'] ?? null;
            $itemId = 0;
        }

        $history = new History();
        $history->name = $rejectedItem['name'] ?? '-';
        $history->mapel = $rejectedItem['mapel'] ?? null;
        $history->barang_tempat = $barangTempat;
        $history->ruang_tempat = $ruangTempat;
        $history->tanggal_pengembalian = now()->toDateString();
        $history->status = 'Rejected';
        $history->alasan = $alasan;
        $history->type = 'pengembalian';
        $history->item_id = $itemId;
        $history->action = 'reject';
        $history->admin_id = auth()->id() ?? 1;
        $history->notes = 'Rejected: ' . $alasan;

        try {
            $history->save();
            Log::info('Rejection saved to history database', [
                'name' => $rejectedItem['name'],
                'status' => 'Rejected'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save rejection to history: ' . $e->getMessage());
            return redirect()->route('approvals.index')
                ->with('status', 'error')
                ->with('message', 'Error saving rejection: ' . $e->getMessage());
        }

        unset($pendingApprovals[$index]);
        Session::put('pending_approvals', $pendingApprovals);

        return redirect()->route('approvals.index')
            ->with('status', 'failed')
            ->with('message', 'Permintaan telah ditolak dan disimpan ke history!');
    }
}