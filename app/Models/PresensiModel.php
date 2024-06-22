<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PresensiModel extends Model
{
    protected $table = 'presensi';

    protected $fillable = [
        'nim',
        'nama_mhs',
        'nama_mk',
        'status',
        'waktu_absen',
    ];

    public static function storeDataWithTimestamps(array $data)
    {
        $timestamp = Carbon::now();

        foreach ($data as &$row) {
            // Append the timestamps to the data array
            $row['created_at'] = $timestamp;
            $row['updated_at'] = $timestamp;
        }

        DB::table('presensi')->insert($data);
    }

    public function alldata()
    {
        return DB::table('presensi')->orderBy('updated_at', 'desc')->get();
    }

}
