<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReportModel;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->ReportModel = new ReportModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
       $data = [
           'report' => $this->ReportModel->alldata(),
       ];
       return view('v_report',$data);
    }
    public function detail($id)
    {
        if(!$this->ReportModel->detailreport($id))
        {
            abort (404);
        }
        $data = [
            'report' => $this->ReportModel->detailreport($id),
        ];
        return view('v_detailreport',$data);
    }
    public function tambah() // mebuat kode karyawan otomatis
    {
        return view('cobareport');
    }
    
    public function tambahdata()
    {
        //validasi data
        Request()->validate([
            'tanggal' => 'required',
            'NamaKaryawan' => 'required',
            'NamaJabatan' => 'required',
            'NamaJobdesk' => 'required',
            'JobdeskDetail' => 'required',
            'KegiatanHarian' => 'required',
            'status' => 'required',
        ],[
            //custome pesan
            'tanggal.required' => 'Tanggal Wajib di isi',
            'NamaKaryawan.required' => 'Nama Karyawan Wajib di isi',
            'NamaJabatan.required' => 'Nama Jabatan Wajib di isi',
            'NamaJobdesk.required' => 'Nama Jobdesk Wajib di isi',
            'JobdeskDetail.required' => 'Jobdesk Detail Wajib di isi',
            'KegiatanHarian.required' => 'Kegiatan Harian Wajib di isi',
            'status.required' => 'Status Wajib di isi',

            
        ]);
        
        $data =[
            'tanggal' => Request()->tanggal,
            'NamaKaryawan' => Request()->NamaKaryawan,
            'NamaJabatan' => Request()->NamaJabatan,
            'NamaJobdesk' => Request()->NamaJobdesk,
            'JobdeskDetail' => Request()->JobdeskDetail,
            'KegiatanHarian' => Request()->KegiatanHarian,
            'status' => Request()->status,
            
        ];
        $this->ReportModel->tambahdata($data);
        return redirect()->route('dashboard.buatreport')->with('pesan','Laporan Telah Berhasil Diajukan');
    }
    public function edit($id)
    {
        if(!$this->ReportModel->detailreport($id))
        {
            abort (404);
        }
        $data = [
            'report' => $this->ReportModel->detailreport($id),
        ];
        return view('g_report',$data);

    }
    public function generate($id)
    {
        //validasi data
        Request()->validate([
            'tanggal' => 'required',
            'NamaKaryawan' => 'required',
            'NamaJabatan' => 'required',
            'NamaJobdesk' => 'required',
            'JobdeskDetail' => 'required',
            'KegiatanHarian' => 'required',
            'status' => 'required',
        ],[
            //custome pesan
            'tanggal.required' => 'Tanggal Wajib di isi',
            'NamaKaryawan.required' => 'Nama Karyawan Wajib di isi',
            'NamaJabatan.required' => 'Nama Jabatan Wajib di isi',
            'NamaJobdesk.required' => 'Nama Jobdesk Wajib di isi',
            'JobdeskDetail.required' => 'Jobdesk Detail Wajib di isi',
            'KegiatanHarian.required' => 'Kegiatan Harian Wajib di isi',
            'status.required' => 'Status Wajib di isi',

            
        ]);

        $data =[
            'tanggal' => Request()->tanggal,
            'NamaKaryawan' => Request()->NamaKaryawan,
            'NamaJabatan' => Request()->NamaJabatan,
            'NamaJobdesk' => Request()->NamaJobdesk,
            'JobdeskDetail' => Request()->JobdeskDetail,
            'KegiatanHarian' => Request()->KegiatanHarian,
            'status' => Request()->status,
            
        ];
        $this->ReportModel->updatedata($id,$data);
        return redirect()->route('dashboard.report')->with('pesan','Generate Laporan Berhasil!!!');
    }
    public function destroy( $id)
    {
        if(!$this->ReportModel->detailreport($id))
        {
            abort (404);
        }
        $data = [
            'report' => $this->ReportModel->detailreport($id),
        ];
        $this->ReportModel->hapusdata($id, $data);
        return redirect()->route('dashboard.report')->with('pesan','Data Telah Berhasil DiHapus !!!');
    }
    public function export() // Memanggi data di tabel report
    {
       $data = [
           'report' => $this->ReportModel->alldata(),
       ];
       return view('export',$data);
    }
    public function coba(){
        //membuat koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "multiauth");
    
        //variabel nama yang dikirimkan form.php
        $NamaKaryawan = $_GET['NamaKaryawan'];
    
        //mengambil data
        $query = mysqli_query($koneksi, "select * from karyawans where NamaKaryawan='$NamaKaryawan'");
        $karyawan = mysqli_fetch_array($query);
        $data = array(
                    'jabatan'=> $karyawan['jabatan'],
                    'jobdesk' => $karyawan['jobdesk'],);
        //tampil data
        echo json_encode($data);
    }
}
