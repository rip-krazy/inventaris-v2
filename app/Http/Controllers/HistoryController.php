<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.history.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $day)
{
    // Array data aktivitas sesuai hari
    $historyDetails = [
        'senin' => [
            'title' => 'Senin',
            'date' => 'Januari 5, 2025',
            'description' => 'Deskripsi tindakan yang dilakukan pada hari Senin. Rincian mengenai apa yang terjadi pada hari ini.',
            'extra' => 'Detail tambahan untuk aktivitas pada Senin.'
        ],
        'selasa' => [
            'title' => 'Selasa',
            'date' => 'Januari 6, 2025',
            'description' => 'Deskripsi tindakan yang dilakukan pada hari Selasa. Rincian mengenai apa yang terjadi pada hari ini.',
            'extra' => 'Detail tambahan untuk aktivitas pada Selasa.'
        ],
        'rabu' => [
            'title' => 'Rabu',
            'date' => 'Januari 7, 2025',
            'description' => 'Deskripsi tindakan yang dilakukan pada hari Rabu. Rincian mengenai apa yang terjadi pada hari ini.',
            'extra' => 'Detail tambahan untuk aktivitas pada Rabu.'
        ],
        'kamis' => [
            'title' => 'Kamis',
            'date' => 'Januari 8, 2025',
            'description' => 'Deskripsi tindakan yang dilakukan pada hari Kamis. Rincian mengenai apa yang terjadi pada hari ini.',
            'extra' => 'Detail tambahan untuk aktivitas pada Kamis.'
        ],
        'jumat' => [
            'title' => 'Jumat',
            'date' => 'Januari 9, 2025',
            'description' => 'Deskripsi tindakan yang dilakukan pada hari Jumat. Rincian mengenai apa yang terjadi pada hari ini.',
            'extra' => 'Detail tambahan untuk aktivitas pada Jumat.'
        ],
        'sabtu' => [
            'title' => 'Sabtu',
            'date' => 'Januari 10, 2025',
            'description' => 'Deskripsi tindakan yang dilakukan pada hari Sabtu. Rincian mengenai apa yang terjadi pada hari ini.',
            'extra' => 'Detail tambahan untuk aktivitas pada Sabtu.'
        ]
    ];

    // Jika data hari yang diminta tidak ditemukan, tampilkan halaman 404
    if (!array_key_exists($day, $historyDetails)) {
        abort(404);
    }

    // Mengambil data detail aktivitas hari tertentu
    $history = $historyDetails[$day];

    return view('admin.history.show', compact('history'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
