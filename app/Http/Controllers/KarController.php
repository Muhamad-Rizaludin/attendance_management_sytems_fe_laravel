<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\KelasModel;
use app\Helpers\Helper;
use App\Models\karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KarController extends Controller
{

    public function __construct()
    {
        $this->KelasModel = new KelasModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
        $data = [
            'kelas' => $this->KelasModel->alldata(),
        ];
        return view('v_kelas', $data);
    }
    public function tambahdata()
    {
        $data = [
            'kode_kelas' => Request()->kode_kelas,
            'nama_mk' => Request()->nama_mk,
            'kode_mk' => Request()->kode_mk,
            'nama_dosen' => Request()->nama_dosen,
            'kode_dosen' => Request()->kode_dosen,
            // 'nim' => Request()->nim,
            // 'nama_mhs' => Request()->nama_mhs,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->KelasModel->tambahdata($data);
        return redirect()->route('dashboard.kelas')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }

    public function updatekar($kode_kelas)
    {
        $data = [
            'kode_kelas' => Request()->kode_kelas,
            'nama_mk' => Request()->nama_mk,
            'kode_mk' => Request()->kode_mk,
            'nama_dosen' => Request()->nama_dosen,
            'kode_dosen' => Request()->kode_dosen,
            // 'nim' => Request()->nim,
            // 'nama_mhs' => Request()->nama_mhs,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->KelasModel->updatedata($kode_kelas, $data);
        return redirect()->route('dashboard.kelas')->with('pesan', 'Data Telah Berhasil DiUpdate !!!');
    }

    public function getMahasiswa()
    {
        $mahasiswa = $this->KelasModel->getMhs();

        return response()->json(['mahasiswa' => $mahasiswa]);
    }

    public function getNim(Request $request)
    {
        $namaMhs = $request->input('nama_mhs');
        $nim = $this->KelasModel->getNimByNamaMhs($namaMhs);

        return response()->json(['nim' => $nim]);
    }
    public function getMatakuliah()
    {
        $matakuliah = $this->KelasModel->getMatakuliah();

        return response()->json(['matakuliah' => $matakuliah]);
    }

    public function getKodeMk(Request $request)
    {
        $namaMk = $request->input('nama_mk');
        $kode_mk = $this->KelasModel->getKodeMkByNamaMk($namaMk);

        return response()->json(['kode_mk' => $kode_mk]);
    }

    public function getDosen()
    {
        $dosen = $this->KelasModel->getNamaDosen();

        return response()->json(['dosen' => $dosen]);
    }

    public function getKodeDosen(Request $request)
    {
        $namaDosen = $request->input('nama_dosen');
        $kode_dosen = $this->KelasModel->getKodeDosenByNamaDosen($namaDosen);

        return response()->json(['kode_dosen' => $kode_dosen]);
    }

    public function destroy($kode_kelas)
    {
        $this->KelasModel->hapusdata($kode_kelas);
        return redirect()->route('dashboard.kelas')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }
}
