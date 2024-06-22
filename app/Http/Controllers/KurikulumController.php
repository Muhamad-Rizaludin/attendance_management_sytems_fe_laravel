<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Helpers\Helper;
use App\Models\KurikulumModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KurikulumController extends Controller
{
    public function __construct()
    {
        $this->KurikulumModel = new KurikulumModel();
    }

    public function index()
    {
        $data = [
            'kurikulum' => $this->KurikulumModel->alldata(),
        ];
        return view('v_kurikulum', $data);
    }

    public function tambahdata()
    {
        $data = [
            'kode_mk' => Request()->kode_mk,
            'nama_mk' => Request()->nama_mk,
            'sks' => Request()->sks,
            'semester' => Request()->semester,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->KurikulumModel->tambahdata($data);
        return redirect()->route('dashboard.kurikulum')->with('pesan', 'Data Telah Berhasil Disimpan!!!');
    }
    public function updatekurikulum($kode_mk)
    {
        $data = [
            'kode_mk' => Request()->kode_mk,
            'nama_mk' => Request()->nama_mk,
            'sks' => Request()->sks,
            'semester' => Request()->semester,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->KurikulumModel->updatedata($kode_mk, $data);
        return redirect()->route('dashboard.kurikulum')->with('pesan', 'Data Telah Berhasil DiUpdate !!!');
    }
    public function destroy($kode_mk)
    {
        $this->KurikulumModel->hapusdata($kode_mk);
        return redirect()->route('dashboard.kurikulum')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }
}
