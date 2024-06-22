<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiModel;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{

    public function __construct()
    {
        $this->PresensiModel = new PresensiModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
        $data = [
            'presensi' => $this->PresensiModel->alldata(),
        ];
        return view('v_report', $data);
    }

    public function tambahdata(Request $request)
    {
        try {
            $dataToStore = json_decode($request->input('presensi_data'), true);

            // Mengecek jika tidak ada data mahasiswa
            if (empty($dataToStore)) {
                return redirect()->back()->with('warning', 'Presensi tidak dilakukan karena tidak terdapat mahasiswa yang mengambil perkuliahan ini');
            }
            
            DB::transaction(function () use ($dataToStore) {
                foreach ($dataToStore as &$row) {
                    if (empty($row['waktu_absen'])) {
                        $row['waktu_absen'] = null;
                    }
                }
                $this->PresensiModel->storeDataWithTimestamps($dataToStore);
            });
            
            return redirect()->back()->with('success', 'Data presensi berhasil disimpan');
        } catch (\Exception $e) {
            // Add this line to see the error message
            // dd($e->getMessage());

            return redirect()->back()->with('error', 'Error storing data');
        }
    }
}
