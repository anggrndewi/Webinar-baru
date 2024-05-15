<?php namespace App\Controllers;

use \App\Models\pendaftaranmodel;
use \App\Models\webinarModel;
use \App\Models\presensiModel;
use \App\Controllers\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;

class Customer extends BaseController
{
    public function home()
    {
        $db = db_connect();
        $query =$db->query('SELECT * FROM webinar')->getResult();
        
        $data['deskwebinar'] = $query;

        echo view('layout/header', $data);
        echo View ('Home');
        echo View('layout/footer');
    }

    public function detailwebinar($id=NULL)
    {
        $deskwebinar = new webinarModel();
        
        $data = ['deskwebinar' => $deskwebinar->WHERE('id', $id)->find()];

        echo view('layout/header', $data);
        echo View('deskripsi');
        echo View('layout/footer');  

    }

    public function lihat()
    {
        $db = db_connect();
        $query =$db->query('SELECT * FROM pendaftaran')->getResult();
        
        $data['tampildata'] = $query;

        echo view('layout/header', $data);
        echo View ('tampildatacustomer');
        echo View('layout/footer'); 
    }

    public function pendaftaran($id)
    {
        $data = ['id' => $id];
        echo view('layout/header');
        echo View('pendaftaranwebinar', $data);
        echo View('layout/footer');
    }

    public function storependaftaran()
    {
        $pendaftaran = new pendaftaranmodel();
            $data = [
                'id_webinar'=> $this->request->getPost('id_webinar'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'nowa' => $this->request->getPost('nowa'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $id_webinar=$this->request->getPost('id_webinar');
            $email=$this->request->getPost('email');
            $nama=$this->request->getPost('nama');
            $pendaftaran->save($data);
            
            $db = db_connect();
            $sertifikat =$db->query("SELECT * FROM notifikasi WHERE id_webinar='$id_webinar'")->getRow();
            $sertifikat =$db->query("SELECT * FROM webinar WHERE id='$id_webinar'")->getRow();
            
            // //dd($email);
            // $kirimemail = new Email();
            // $isiemail = $query->pesan."<br><br>Link Webinar = ".$query->linkwebinar."<br><br>Link Presensi = ".$query->linkpresensi;
            // //dd($isiemail);
            // $kirimemail->send($email, $isiemail);

            return redirect()->to('/home')->with('message', 'Berhasil Submit Data!');
        }
        
        public function generate()
        {
            $pendaftaran = new pendaftaranmodel();
            $data = [
                'id_webinar'=> $this->request->getPost('id_webinar'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'nowa' => $this->request->getPost('nowa'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $id_webinar=$this->request->getPost('id_webinar');
            $email=$this->request->getPost('email');
            $nama=$this->request->getPost('nama');
            $pendaftaran->save($data);
            
            $db = db_connect();
            $query =$db->query("SELECT * FROM notifikasi WHERE id_webinar='$id_webinar'")->getRow();
            $sertifikat =$db->query("SELECT * FROM webinar WHERE id='$id_webinar'")->getRow();
            

        // Generate sertifikat
        $sertifikatPath = $this->generateSertifikat($nama, $id_webinar);
        // Kirim sertifikat melalui email
        $kirimemail = new Email();
        $kirimemail->send($email, $sertifikatPath);

        // Redirect ke halaman yang menampilkan sertifikat
        return redirect()->to('/dashboard');
    }

    private function generateSertifikat($nama, $id_webinar)
    {
        // Generate gambar sertifikat kosong (sertifikat-template.png adalah file template sertifikat)
        $db = db_connect();
        $sertifikat =$db->query("SELECT * FROM webinar WHERE id='$id_webinar'")->getRow();
        $template = imagecreatefrompng(base_url().'assets/img/webinar/'.$sertifikat->sertifikat);

        // Atur font dan warna teks
        $fontColor = imagecolorallocate($template, 0, 0, 0); // Warna teks (RGB: 0, 0, 0)
        $fontName = 'arial.ttf'; // Ganti dengan path ke font yang diinginkan

        // Atur teks yang akan ditampilkan di sertifikat
        $text1 = "Sertifikat";
        $text2 = "Diberikan kepada:";
        $text3 = $nama;
        $text4 = "Untuk kegiatan:";
        $text5 = $waktu;

        // Tentukan posisi teks pada gambar sertifikat
        $text1Pos = imagettfbbox(60, 0, $fontName, $text1);
        $text2Pos = imagettfbbox(24, 0, $fontName, $text2);
        $text3Pos = imagettfbbox(36, 0, $fontName, $text3);
        $text4Pos = imagettfbbox(24, 0, $fontName, $text4);
        $text5Pos = imagettfbbox(24, 0, $fontName, $text5);

        // Hitung lebar dan tinggi gambar sertifikat
        $imageWidth = imagesx($template);
        $imageHeight = imagesy($template);

        // Tengah-tengahkan teks pada gambar sertifikat
        $text1X = ($imageWidth - $text1Pos[2]) / 2;
        $text2X = ($imageWidth - $text2Pos[2]) / 2;
        $text3X = ($imageWidth - $text3Pos[2]) / 2;
        $text4X = ($imageWidth - $text4Pos[2]) / 2;
        $text5X = ($imageWidth - $text5Pos[2]) / 2;

        // Atur posisi vertikal teks pada gambar sertifikat
        $text1Y = 150;
        $text2Y = $imageHeight / 2 - 20;
        $text3Y = $imageHeight / 2 + 40;
        $text4Y = $imageHeight / 2 + 80;
        $text5Y = $imageHeight / 2 + 120;

        // Tambahkan teks ke gambar sertifikat
        imagettftext($template, 60, 0, $text1X, $text1Y, $fontColor, $fontName, $text1);
        imagettftext($template, 24, 0, $text2X, $text2Y, $fontColor, $fontName, $text2);
        imagettftext($template, 36, 0, $text3X, $text3Y, $fontColor, $fontName, $text3);
        imagettftext($template, 24, 0, $text4X, $text4Y, $fontColor, $fontName, $text4);
        imagettftext($template, 24, 0, $text5X, $text5Y, $fontColor, $fontName, $text5);

        // Simpan gambar sertifikat (sertifikat-nama.jpg adalah nama file sertifikat yang disimpan)
        $outputFile = 'sertifikat-' . $nama . '.jpg';
        imagejpeg($template, $outputFile);

        // Hapus gambar sertifikat dari memori
        imagedestroy($template);
    }

    public function view()
    {
        // Ambil nama file sertifikat yang telah dibuat sebelumnya
        $fileName = 'sertifikat-' . $this->request->getPost('nama') . '.jpg';

        // Tampilkan halaman dengan sertifikat
        return view('sertifikat_view', ['fileName' => $fileName]);
    }


    public function presensi()
    {
        echo view('layout/header');
        echo View('prisensi');
        echo View('layout/footer');
    }

    public function storepresensi()
    {
        $presensi = new presensiModel();
        $img = $this->request->getFile('bukti');
         dd($img);
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $filepath = ROOTPATH.'public/assets/img/presensi/';
            $img->move($filepath,$newName);
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'nowa' => $this->request->getPost('nowa'),
                'alamat' => $this->request->getPost('alamat'),
                'bukti' => $newName,
            ];
            $presensi->save($data);
            return redirect()->back()->with('message', 'Berhasil Submit Data!');
        }
    }

    public function notifikasi($daftar = NULL)
    {
        if($daftar == NULL || $daftar == 0){
            $data = [
                'judul' => 'Pendaftaran Gagal',
                'deskripsi' => 'Mohon maaf pendaftaran anda gagal, mohon diulangi kembali.' 
            ];
        }else{
            $data = [
                'judul' => 'Pendaftaran Berhasil',
                'deskripsi' => 'Selamat, pendaftaran anda berhasil.<br>
                                Silahkan cek email atau whatsapp yang anda daftarkan untuk melihat data webinar.<br>
                                Terimakasih' 
            ];
        }
        echo view('layout/header');
        echo View('notifikasi',$data);
        echo View('layout/footer');  
    }
}

?>