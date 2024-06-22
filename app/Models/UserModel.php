<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public function alldata()
    {
        return DB::table('users')->orderBy('updated_at', 'desc')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('users')->insert($data);
    }
    public function detailUser($id)
    {
        return DB::table('users')->where('id',$id)->first();
    }
    public function updatedata($id, $data)
    {
        return DB::table('users')
        ->where('id', $id)
        ->update($data);
    }
    public function hapusdata($id)
    {
        return DB::table('users')
        ->where('id', $id)
        ->delete();
    }
}
