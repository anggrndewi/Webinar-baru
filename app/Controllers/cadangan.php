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
            $pendaftaran->save($data);
            
            $db = db_connect();
            $query =$db->query("SELECT * FROM notifikasi WHERE id_webinar='$id_webinar'")->getRow();
            
            //dd($email);
            $kirimemail = new Email();
            $isiemail = $query->pesan."<br><br>Link Webinar = ".$query->linkwebinar."<br><br>Link Presensi = ".$query->linkpresensi;
            //dd($isiemail);
            $kirimemail->send($email, $isiemail);
            return redirect()->to('/home')->with('message', 'Berhasil Submit Data!');
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