<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DosenModel;
use Illuminate\Http\Request;
use app\Helpers\Helper;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->DosenModel = new DosenModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
        $data = [
            'dosen' => $this->DosenModel->alldata(),
        ];
        return view('v_dosen', $data);
    }

    public function tambahdata()
    {
        $data = [
            'kode_dosen' => Request()->kode_dosen,
            'nama_dosen' => Request()->nama_dosen,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->DosenModel->tambahdata($data);
        return redirect()->route('dashboard.dosens')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }
    public function updatedosen($kode_dosen)
    {
        $data = [
            'kode_dosen' => Request()->kode_dosen,
            'nama_dosen' => Request()->nama_dosen,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->DosenModel->updatedata($kode_dosen, $data);
        return redirect()->route('dashboard.dosens')->with('pesan', 'Data Telah Berhasil DiUpdate !!!');
    }
    public function destroy($kode_dosen)
    {
        if (!$this->DosenModel->detaildosen($kode_dosen)) {
            abort(404);
        }
        $data = [
            'dosen' => $this->DosenModel->detaildosen($kode_dosen),
        ];
        $this->DosenModel->hapusdata($kode_dosen, $data);
        return redirect()->route('dashboard.dosens')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }
}
