<?php
require_once __DIR__ . '/../models/M_perusahaan.php';
require_once __DIR__ . '/../models/M_karyawan.php';
require_once __DIR__ . '/../models/M_slipGaji.php';

class DashboardController {
    public function index() {
        $perusahaan = new Perusahaan();
        $karyawan = new Karyawan();
        $slip = new SlipGaji();

        // Isi variabel $data
        $data = [
            'total_perusahaan' => $perusahaan->countAll(),
            'total_karyawan' => $karyawan->countAll(),
            'total_slip' => $slip->countAllBulanIni(),
            'total_gaji_bulan_ini' => $slip->totalBulanIni()
        ];

        // Debugging: Periksa isi $data sebelum extract
        // echo '<pre>';
        // echo "Debug di Controller: Isi \$data sebelum extract:\n";
        // var_dump($data);
        // echo '</pre>';

        // Pastikan $data adalah array
        if (!is_array($data)) {
            $data = [];
            echo "Debug: \$data diubah menjadi array kosong karena tidak valid\n";
        }

        // Ekstrak variabel dari $data ke scope saat ini
        // extract($data);

        // Debugging: Periksa variabel setelah extract
        // echo '<pre>';
        // echo "Debug di Controller: Isi variabel setelah extract:\n";
        // var_dump(isset($total_karyawan) ? $total_karyawan : 'undefined');
        // var_dump(isset($total_slip) ? $total_slip : 'undefined');
        // var_dump(isset($total_gaji_bulan_ini) ? $total_gaji_bulan_ini : 'undefined');
        // echo '</pre>';

        // Include view
        // echo '<hr><h3>Loading View:</h3>';
        $viewPath = dirname(__DIR__) . '/views/dashboard.php';
        // if (file_exists($viewPath)) {
        //     echo "✓ File view ditemukan: $viewPath<br><br>";
            include $viewPath;
        // } else {
        //     echo "✗ File view TIDAK ditemukan: $viewPath<br>";
        // }
    }
}