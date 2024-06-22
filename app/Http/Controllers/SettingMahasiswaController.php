<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SettingMahasiswaModel;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SettingMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->SettingMahasiswaModel = new SettingMahasiswaModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
        $data = [
            'setting' => $this->SettingMahasiswaModel->alldata(),
        ];
        return view('v_kelas_mahasiswa', $data);
    }
    public function tambahdata()
    {
        $nim = Request()->nim;
        $kodeMk = Request()->kode_mk;
        $namaMk = Request()->nama_mk;

        // cek mahasiswa telah mengambil matakuliah
        $existingData = $this->SettingMahasiswaModel->getByNimAndKodeMk($nim, $kodeMk);

        if ($existingData) {
            return redirect()->back()->with('error', 'Mahasiswa dengan Nim ' . $nim . ' telah mengambil matakuliah ' . $namaMk);
        }

        $data = [
            'nim' => $nim,
            'nama_mhs' => Request()->nama_mhs,
            'nama_mk' => Request()->nama_mk,
            'kode_mk' => $kodeMk,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->SettingMahasiswaModel->tambahdata($data);
        return redirect()->route('dashboard.settingmhs')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }
    public function updatesetting($id)
    {
        $nim = Request()->nim;
        $kodeMk = Request()->kode_mk;
        $namaMk = Request()->nama_mk;

        // cek mahasiswa telah mengambil matakuliah
        $existingData = $this->SettingMahasiswaModel->getByNimAndKodeMk($nim, $kodeMk);

        if ($existingData) {
            return redirect()->back()->with('error', 'Mahasiswa dengan Nim ' . $nim . ' telah mengambil matakuliah ' . $namaMk);
        }

        $data = [
            'id' => Request()->id,
            'nim' => $nim,
            'nama_mhs' => Request()->nama_mhs,
            'nama_mk' => Request()->nama_mk,
            'kode_mk' => $kodeMk,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->SettingMahasiswaModel->updatedata($id, $data);
        return redirect()->route('dashboard.settingmhs')->with('pesan', 'Data Telah Berhasil DiUpdate !!!');
    }
    public function destroy($id)
    {
        $this->SettingMahasiswaModel->hapusdata($id);
        return redirect()->route('dashboard.settingmhs')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }
}
