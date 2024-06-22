<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kelasModel = new KelasModel();
        $user_login = Auth::user()->kode_dosen;
        $data = [
            'kelas' => $kelasModel->alldata(),
            'count_data_user' => $kelasModel->countDataUserForDashboard(),
            'count_data_kelas' => $kelasModel->countDataKelasForDashboard(),
            'count_data_kelas_dosen' => $kelasModel->alldataKelasDosen($user_login),
        ];
    
        if (Auth::user()->hasRole('karyawan')) {
            return view('dosenhome',$data);
        } elseif (Auth::user()->hasRole('admin')) {
            return view('adminhome', $data); // Assuming 'adminhome' is the view for the admin dashboard.
        }
    }
    
}
