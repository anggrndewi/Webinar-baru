<?php namespace App\Controllers;

use \App\Models\pendaftaranmodel;
use \App\Models\webinarModel;
use \App\Models\presensiModel;
use \App\Models\userModel;
use \App\Controllers\Email;
use \App\Controllers\whatsapp;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;

class Customer extends BaseController
{
    public function home()
    {
        $db = db_connect();
        $query =$db->query('SELECT * FROM webinar order by id desc  ')->getResult();
        
        $data['deskwebinar'] = $query;

        echo view('user/layout/header', $data);
        echo View ('user/Home');
        echo View('user/layout/footer');
    }

    public function detailwebinar($id=NULL)
    {
        $deskwebinar = new webinarModel();
        
        $data = ['deskwebinar' => $deskwebinar->WHERE('id', $id)->find()];

        echo view('user/layout/header', $data);
        echo View('user/deskripsi');
        echo View('user/layout/footer');  

    }

    public function loginuser()
    {
        $session = session();
    
        if ($session->get('loginuser')) {
            // Pengguna sudah login, arahkan ke halaman pendaftaran webinar
            return redirect()->to('/pendaftaranwebinar')->with('message', 'Berhasil Login');
        } else {
            // Pengguna belum login, tampilkan halaman login
            echo View('user/login');
        }
    }

    public function actloginuser()
    {
        $user = new userModel();
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $vrf = [
            'email' => $email,
            'password' => $password,
        ];

        $cekemail = $user->where($vrf)->find();

        if ($cekemail != NULL) {
            // Jika login berhasil, set session 'loginuser' menjadi TRUE
            $data = [
                'nama' => $cekemail[0]['nama'],
                'email' => $cekemail[0]['email'],
                'loginuser' => TRUE
            ];
            $session->set($data);
            return redirect()->to('/')->with('message', 'Berhasil Masuk!');
        } else {
            // Jika login gagal, kembalikan pengguna ke halaman sebelumnya
            return redirect()->back()->with('message', 'Gagal Masuk!');
        }
    }

    public function logout()
    {
        $session = session();
        
        // Hapus session yang menandakan pengguna telah login
        $session->remove('loginuser');
        
        // Arahkan pengguna ke halaman utama
        return redirect()->to('/')->with('message', 'Berhasil Keluar!');
    }

    public function pendaftaran($id)
    {
        $session = session();
        $data = ['id' => $id];
        if ($session->get('loginuser') != TRUE) {
            // Jika pengguna belum login, arahkan mereka ke halaman login
            return redirect()->to('/loginuser')->with('message', 'Belum Login');
        }
        // Pengguna sudah login, tampilkan halaman pendaftaran webinar
        echo View('user/pendaftaranwebinar', $data);
    }


    public function lihat()
    {
        $db = db_connect();
        $query =$db->query('SELECT * FROM pendaftaran')->getResult();
        
        $data['tampildata'] = $query;

        echo view('user/layout/header', $data);
        echo View ('tampildatacustomer');
        echo View('user/layout/footer'); 
    }

   

    public function storependaftaran()
    {
        $pendaftaran = new pendaftaranmodel();
        $nomor = $this->request->getPost('nowa');
        
        $nomorHpClean = str_replace('-', '', $nomor);
            $data = [
                'id_webinar'=> $this->request->getPost('id_webinar'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'nowa' => $nomorHpClean,
                'alamat' => $this->request->getPost('alamat'),
            ];
            $id_webinar=$this->request->getPost('id_webinar');
            $email=$this->request->getPost('email');
            $nowa=$this->request->getPost('nowa');
            $pendaftaran->save($data);
            
            $db = db_connect();
            $query =$db->query("SELECT * FROM notifikasi WHERE id_webinar='$id_webinar'")->getRow();
            
            //dd($email);
            $kirimemail = new Email();
            $isiemail = nl2br($query->pesan."<br><br>Link Webinar = ".$query->linkwebinar."<br><br>Link Presensi = ".$query->linkpresensi);
            //dd($isiemail);
            $kirimemail->send($email, $isiemail);

            $kirimwa = new whatsapp();
            $isiwa = $query->pesanwa;
            $kirimwa ->send($nowa, $isiwa);

            return redirect()->to('/')->with('message', 'Berhasil Submit Data!');
    }
    
    public function presensi($id)
    {
        $data = ['id' => $id];
        
        echo View('user/prisensi', $data);
       
    }

    public function storepresensi()
    {
        $presensi = new presensiModel();
            $data = [
                'id_webinar'=> $this->request->getPost('id_webinar'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'nowa' => $this->request->getPost('nowa'),
                'alamat' => $this->request->getPost('alamat'),    
            ];
            $absen = $presensi->save($data);
    //         return redirect()->to('/sertifikat')->with('message', 'Berhasil Submit Data!');
    // }

    // public function sertifikat($input = NULL)
    // {
        if(!$absen){
            $data = [
                'tema' => 'Presensi Gagal',
                'deskripsi' => 'Mohon maaf Presensi anda gagal, mohon diulangi kembali.',

            ];
        }else{
            $id_webinar= $this->request->getPost('id_webinar');
            $db = db_connect();
            $query =$db->query("SELECT * FROM webinar WHERE id='$id_webinar'")->getRow();

            $materi = $db->query("SELECT * FROM notifikasi WHERE id_webinar='$id_webinar'")->getRow();

            $data = [
                'tema' => 'Presensi Berhasil',
                'deskripsi' => 'Selamat, Presensi anda berhasil.<br>
                                Terimakasih',
                'nama' => $this->request->getPost('nama'),
                'judul' => $query->judul,
                'waktu' => $query->waktu,
                'id_webinar' => $id_webinar,
                'materi'    => $materi,
            ];
        }
        echo view('user/layout/header');
        echo View('sertifikat',$data);
 
    }

    public function downloadmateri($id)
    {
        $db = db_connect();
        $query =$db->query("SELECT * FROM notifikasi WHERE id_webinar='$id'")->getRow();
        $file = $query->materi;
        $path = realpath('assets/materi/'.$file);

        if(file_exists($path)) {
            return $this->response->download($path, null);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function registrasi()
    {
        echo View('user/registrasi');   
    }

    public function storetambahuser()
    {
        $registrasi = new userModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'nomerhp' => $this->request->getPost('nomerhp'),
            'password' => $this->request->getPost('password'),
        ];
        $registrasi->save($data);
        return redirect()->to('/loginuser')->with('message', 'Berhasil Submit Data!');
    }

}

?>