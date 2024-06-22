<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportModel extends Model
{
    use HasFactory;
    public function alldata()
    {
        return DB::table('reports')->get();
    }
    public function tambahdata($data)
   {
       return DB::table('reports')->insert($data);
   }
   public function detailreport($id)
   {
    return DB::table('reports')->where('id',$id)->first();
   }
   public function updatedata($id, $data)
    {
        return DB::table('reports')
        ->where('id', $id)
        ->update($data);
    }
   public function alldatakar()
    {
        return DB::table('karyawans')->get();
    }
    public function hapusdata($id)
   {
       return DB::table('reports')
       ->where('id', $id)
       ->delete();
   }
   
}
