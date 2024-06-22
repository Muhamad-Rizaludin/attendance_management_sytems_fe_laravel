<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KurikulumModel extends Model
{
    public function alldata()
    {
        return DB::table('kurikulum')->orderBy('updated_at', 'desc')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('kurikulum')->insert($data);
    }
    public function detailkurikulum($kode_mk)
    {
        return DB::table('kurikulum')->where('kode_mk', $kode_mk)->first();
    }
    public function updatedata($kode_mk, $data)
    {
        return DB::table('kurikulum')
            ->where('kode_mk', $kode_mk)
            ->update($data);
    }
    public function hapusdata($kode_mk)
    {
        return DB::table('kurikulum')
            ->where('kode_mk', $kode_mk)
            ->delete();
    }
}
