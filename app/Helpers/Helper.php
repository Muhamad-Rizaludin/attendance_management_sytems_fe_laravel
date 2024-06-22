<?php
    namespace app\Helpers;

    class Helper{
        public static function IDgenerator($model,$trow,$panjang = 4,$prefix) // parameter masukan
        {
            $data =$model::orderby('id','desc')->first(); // query memanggil model

            if ( !$data) {
                $og_panjang =$panjang;
                $nomor_terakhir = '';

            }
            else{
                $kode = substr($data->$trow, strlen($prefix)+1); // memisahkan data (prefik dengan no urut)
                $aktual_no_terakhir = ($kode/1)*1 ;
                $tambah_no_terakhir = $aktual_no_terakhir+1;
                $panjang_no_terakhir = strlen($tambah_no_terakhir);
                $og_panjang = $panjang - $panjang_no_terakhir;
                $nomor_terakhir = $tambah_no_terakhir;
            }
            $zeros ="";
            for($i=0;$i<$og_panjang;$i++)
            {
                // $zeros = date ('y); // jumlah digit 0
                $zeros ='00'; // jumlah digit 0 depan no urut

            }
            return $prefix.''.$zeros.$nomor_terakhir; // mengembalikan nilai atau format
        }        
    }
?>