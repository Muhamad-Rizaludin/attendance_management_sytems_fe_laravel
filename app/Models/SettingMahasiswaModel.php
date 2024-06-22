<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingMahasiswaModel extends Model
{
    public function alldata()
    {
        return DB::table('mahasiswa_matakuliah')->orderBy('updated_at', 'desc')->get();
    }
    public function getByNimAndKodeMk($nim, $kodeMk)
    {
        return DB::table('mahasiswa_matakuliah')
            ->where('nim', $nim)
            ->where('kode_mk', $kodeMk)
            ->first();
    }
    public function tambahdata($data)
    {
        return DB::table('mahasiswa_matakuliah')->insert($data);
    }
    public function updatedata($id, $data)
    {
        return DB::table('mahasiswa_matakuliah')
            ->where('id', $id)
            ->update($data);
    }
    public function hapusdata($id)
    {
        return DB::table('mahasiswa_matakuliah')
            ->where('id', $id)
            ->delete();
    }
}
