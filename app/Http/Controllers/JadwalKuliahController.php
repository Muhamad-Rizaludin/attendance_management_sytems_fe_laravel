<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Helpers\Helper;
use App\Models\JadwalKuliahModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;

class JadwalKuliahController extends Controller
{
    public function __construct()
    {
        $this->JadwalKuliahModel = new JadwalKuliahModel();
    }

    public function index()
    {
        $data = [
            'jadwal' => $this->JadwalKuliahModel->alldata(),
        ];
        return view('v_jadwalkuliah', $data);
    }
    public function tambahdata()
    {
        $data = [
            'kd_jadwal' => Request()->kd_jadwal,
            'kode_kelas' => Request()->kode_kelas,
            'kode_mk' => Request()->kode_mk,
            'nama_mk' => Request()->nama_mk,
            'wajib_sks' => Request()->wajib_sks,
            'tanggal' => Request()->tanggal,
            'mulai' => Request()->mulai,
            'selesai' => Request()->selesai,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->JadwalKuliahModel->tambahdata($data);
        return redirect()->route('dashboard.jadwalkuliah')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }
    public function updatejadwal($kd_jadwal)
    {
        $data = [
            'kd_jadwal' => Request()->kd_jadwal,
            'kode_kelas' => Request()->kode_kelas,
            'kode_mk' => Request()->kode_mk,
            'nama_mk' => Request()->nama_mk,
            'wajib_sks' => Request()->wajib_sks,
            'tanggal' => Request()->tanggal,
            'mulai' => Request()->mulai,
            'selesai' => Request()->selesai,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->JadwalKuliahModel->updatedata($kd_jadwal, $data);
        return redirect()->route('dashboard.jadwalkuliah')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }

    public function getKodeKelas()
    {
        $kelas = $this->JadwalKuliahModel->getKelas();

        return response()->json(['kelas' => $kelas]);
    }

    public function destroy($kd_jadwal)
    {
        $this->JadwalKuliahModel->hapusdata($kd_jadwal);
        return redirect()->route('dashboard.jadwalkuliah')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }

    public function getJadwalKuliahPerDosen()
    {
        $user_login = Auth::user()->kode_dosen;
        $data = [
            'jadwalkelas' => $this->JadwalKuliahModel->alldataKelas($user_login),
        ];
        return view('v_jadwal_kuliah_per_dosen', $data);
    }
    public function detailjadwal($id)
    {
        if(!$this->JadwalKuliahModel->detailjadwal($id))
        {
            abort (404);
        }
        $jadwalDetail = $this->JadwalKuliahModel->detailjadwal($id);
        $mahasiswaByKodeMk = $this->JadwalKuliahModel->getMahasiswaByKodeMk($jadwalDetail->kode_mk);
        $date = $this->JadwalKuliahModel->getDatePresensi();

        $data = [
            'jadwalkelas' => $jadwalDetail,
            'mahasiswa' => $mahasiswaByKodeMk,
            'date' => $date
        ];
        //dd($data);
        return view('v_detail_jadwal_kuliah_per_dosen',$data);

    }
}
