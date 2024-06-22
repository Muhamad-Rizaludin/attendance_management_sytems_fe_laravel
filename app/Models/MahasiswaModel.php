<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    public function alldata()
    {
        return DB::table('mahasiswa')->orderBy('updated_at', 'desc')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('mahasiswa')->insert($data);
    }
    public function detailmahasiswa($nim)
    {
        return DB::table('mahasiswa')->where('nim', $nim)->first();
    }
    public function updatedata($nim, $data)
    {
        return DB::table('mahasiswa')
            ->where('nim', $nim)
            ->update($data);
    }
    public function hapusdata($nim)
    {
        return DB::table('mahasiswa')
            ->where('nim', $nim)
            ->delete();
    }
}
