<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JadwalKuliahModel extends Model
{
    public function alldata()
    {
        return DB::table('jadwal_kuliah')->orderBy('updated_at', 'desc')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('jadwal_kuliah')->insert($data);
    }
    public function updatedata($kd_jadwal, $data)
    {
        return DB::table('jadwal_kuliah')
            ->where('kd_jadwal', $kd_jadwal)
            ->update($data);
    }
    public function hapusdata($kd_jadwal)
    {
        return DB::table('jadwal_kuliah')
            ->where('kd_jadwal', $kd_jadwal)
            ->delete();
    }
    public function getKelas()
    {
        return DB::table('kelas')->pluck('kode_kelas');
    }

    public function alldataKelas($kode_dosen)
    {
        return DB::table('jadwal_kuliah')
            ->join('kelas', 'jadwal_kuliah.kode_kelas', '=', 'kelas.kode_kelas')
            ->where('kelas.kode_dosen', $kode_dosen)
            ->orderBy('jadwal_kuliah.updated_at', 'desc')
            ->get();
    }
    public function detailjadwal($kd_jadwal)
    {
        return DB::table('jadwal_kuliah')->where('kd_jadwal', $kd_jadwal)->first();
    }
    public function getMahasiswaByKodeMk($kodeMk)
    {
        return DB::table('mahasiswa_matakuliah')->where('kode_mk', $kodeMk)->get();
    }
    public function getDatePresensi()
    {
        $latestUpdatedAt = DB::table('presensi')
            ->orderBy('updated_at', 'desc')
            ->pluck('updated_at')
            ->first();

        return $latestUpdatedAt;
    }
}
