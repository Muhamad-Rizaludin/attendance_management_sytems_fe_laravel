<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DosenModel extends Model
{
    public function alldata()
    {
        return DB::table('dosen')->orderBy('updated_at', 'desc')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('dosen')->insert($data);
    }
    public function detaildosen($kode_dosen)
    {
        return DB::table('dosen')->where('kode_dosen', $kode_dosen)->first();
    }
    public function updatedata($kode_dosen, $data)
    {
        return DB::table('dosen')
            ->where('kode_dosen', $kode_dosen)
            ->update($data);
    }
    public function hapusdata($kode_dosen)
    {
        return DB::table('dosen')
            ->where('kode_dosen', $kode_dosen)
            ->delete();
    }
}
