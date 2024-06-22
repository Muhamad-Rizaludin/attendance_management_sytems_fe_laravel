<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelasModel extends Model
{
    public function countDataKelas()
    {
        return DB::table('kelas')->count();
    }
    public function countDataKelasForDashboard()
    {
        return $this->countDataKelas();
    }
    public function countDataKelasForDashboardDosen()
    {
        return $this->countDataKelas();
    }
    public function alldata()
    {
        return DB::table('kelas')->orderBy('updated_at', 'desc')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('kelas')->insert($data);
    }
    public function detailkaryawan($kode_kelas)
    {
        return DB::table('kelas')->where('kode_kelas', $kode_kelas)->first();
    }
    public function updatedata($kode_kelas, $data)
    {
        return DB::table('kelas')
            ->where('kode_kelas', $kode_kelas)
            ->update($data);
    }
    public function hapusdata($kode_kelas)
    {
        return DB::table('kelas')
            ->where('kode_kelas', $kode_kelas)
            ->delete();
    }
    public function alldatauser()
    {
        return DB::table('users')->get();
    }
    public function countDataUser()
    {
        return DB::table('users')->count();
    }
    public function countDataUserForDashboard()
    {
        return $this->countDataUser();
    }
    public function getMhs()
    {
        return DB::table('mahasiswa')->pluck('nama_mhs');
    }
    public function getNimByNamaMhs($namaMhs)
    {
        return DB::table('mahasiswa')->where('nama_mhs', $namaMhs)->value('nim');
    }
    public function getMatakuliah()
    {
        return DB::table('kurikulum')->pluck('nama_mk');
    }
    public function getKodeMkByNamaMk($namaMk)
    {
        return DB::table('kurikulum')->where('nama_mk', $namaMk)->value('kode_mk');
    }
    public function getNamaDosen()
    {
        // return DB::table('user')->pluck('nama_dosen');
        return DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 2)
            ->pluck('users.name');
    }
    public function getKodeDosenByNamaDosen($namaDosen)
    {
        return DB::table('dosen')->where('nama_dosen', $namaDosen)->value('kode_dosen');
    }
    // public function alldataKelas($kode_dosen)
    // {
    //     return DB::table('jadwal_kuliah')
    //         ->join('kelas', 'jadwal_kuliah.kode_kelas', '=', 'kelas.kode_kelas')
    //         ->where('kelas.kode_dosen', $kode_dosen)
    //         ->orderBy('jadwal_kuliah.updated_at', 'desc')
    //         ->get();
    // }
    public function alldataKelasDosen($kode_dosen)
    {
        return DB::table('jadwal_kuliah')
            ->join('kelas', 'jadwal_kuliah.kode_kelas', '=', 'kelas.kode_kelas')
            ->where('kelas.kode_dosen', $kode_dosen)
            ->count();
    }
}
