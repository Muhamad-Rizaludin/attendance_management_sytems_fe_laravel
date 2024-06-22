<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Helpers\Helper;
use App\Models\MahasiswaModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
        $data = [
            'mhs' => $this->MahasiswaModel->alldata(),
        ];
        return view('v_mahasiswa', $data);
    }

    public function tambahdata()
    {
        $data = [
            'nim' => Request()->nim,
            'nama_mhs' => Request()->nama_mhs,
            'prodi' => Request()->prodi,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->MahasiswaModel->tambahdata($data);
        return redirect()->route('dashboard.mahasiswa')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }
    public function updatemahasiswa($nim)
    {
        $data = [
            'nim' => Request()->nim,
            'nama_mhs' => Request()->nama_mhs,
            'prodi' => Request()->prodi,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->MahasiswaModel->updatedata($nim, $data);
        return redirect()->route('dashboard.mahasiswa')->with('pesan', 'Data Telah Berhasil DiUpdate !!!');
    }
    public function destroy($nim)
    {
        if (!$this->MahasiswaModel->detailmahasiswa($nim)) {
            abort(404);
        }
        $data = [
            'mhs' => $this->MahasiswaModel->detailmahasiswa($nim),
        ];
        $this->MahasiswaModel->hapusdata($nim, $data);
        return redirect()->route('dashboard.mahasiswa')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }
}
