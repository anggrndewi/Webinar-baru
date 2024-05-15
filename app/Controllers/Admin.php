<?php namespace App\Controllers;

use \App\Models\pendaftaranmodel;
use \App\Models\presensiModel;
use \App\Models\adminModel;
use App\Models\webinarModel;
use App\Models\notifikasiModel;
use App\Models\grafikModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
   
    public function index()
    {
        $db = db_connect();
        $query =$db->query('SELECT * FROM pendaftaran')->getResult();
        
        $data['tampildata'] = $query;
        echo View('tampildatacustomer', $data);
    }

    public function dashboard()
    {
        $session = session();
        if($session->get('login')!= TRUE)
        {
            return redirect()->to('/login')->with('message', 'Belum Login');
        }
        $db = db_connect();

        // Statistik Grafik Perbulan
        $grafikPendaftarPerbulan = [];

        // Looping 12 bulan di tahun ini dari datetime PHP
        $year = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            $grafikPendaftarPerbulan[] = $db->query("SELECT COUNT(id) as 'jml' FROM `pendaftaran` WHERE MONTH(created_at) = $i AND YEAR(created_at) = $year")->getRow()->jml;
        }

        $data = [
            'webinar' => $db->query("SELECT COUNT(id) as 'jml' FROM `webinar`")->getRow(),
            'pendaftaran' => $db->query("SELECT COUNT(id) as 'jml' FROM `pendaftaran`")->getRow(),
            'grafikPendaftar' => $grafikPendaftarPerbulan
         ];

        echo View('admin/side', $data);
        echo View('admin/topbar');
        echo View('dashboard');
        echo View('admin/footer');
    }

    public function login()
    {
        $session = session();
        if ($session->get('login')) {
            return redirect()->to('/dashboard')->with('message', 'Berhasil Login');
        }
        else{
            echo View('login');
        }
        
    }
    
    public function actlogin()
    {
        $admin = new adminModel();
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $vrf = [
            'email' => $email,
            'password' => $password,
        ];
       
        $cekemail = $admin->where($vrf)->find();
        
         if($cekemail!=NULL){
             $data = [
                 'nama' => $cekemail[0]['nama'],
                 'email' => $cekemail[0]['email'],
                 'login' => TRUE
             ];
             $session->set($data);
             return redirect()->to('/dashboard')->with('message', 'Berhasil Masuk!');
           
         }else{
             return redirect()->back()->with('message', 'Gagal Masuk!');
         }
    }

    public function logout(){
        $session = session();
        
        $session->destroy();
        return redirect()->to('/login')->with('message', 'Berhasil Keluar!');
    }

    public function table()
    {
        
        echo View('admin/side');
        echo View('admin/topbar');
        echo View('table');
    }

    public function datawebinar()
    {

        $db = db_connect();
        $query =$db->query('SELECT * FROM webinar order by id desc')->getResult();
        
        $data['tampildata'] = $query;

        echo View('admin/side', $data);
        echo View('admin/topbar');
        echo View('dataWebinar', $data);
        echo View('admin/footer');
    }  
    public function tambahdatawebinar()
    {
        
        echo View('admin/side');
        echo View('admin/topbar');
        echo View('tambahdatawebinar');
        echo View('admin/footer');
    }
    public function storetambahdatawebinar()
    {
        $tambahdata = new webinarModel();
        $imgposter = $this->request->getFile('poster');
        $imgpemateri = $this->request->getFile('foto_pemateri');
        if (!$imgposter->hasMoved() && !$imgpemateri->hasMoved() ) {
            $newNamep = $imgposter->getRandomName();
            $newNamem = $imgpemateri->getRandomName();
            
            $filepath = ROOTPATH.'public/assets/img/webinar/';
            $imgposter->move($filepath,$newNamep);
            $imgpemateri->move($filepath,$newNamem);
            $data = [
                'judul'=> $this->request->getPost('judul'),
                'waktu' => $this->request->getPost('waktu'),
                'deskwebinar' => $this->request->getPost('deskwebinar'),
                'namapemateri' => $this->request->getPost('namapemateri'),
                'deskpemateri' => $this->request->getPost('deskpemateri'),
                'poster' => $newNamep,
                'foto_pemateri' => $newNamem,
            ];
            $tambahdata->save($data);
            return redirect()->to('/dashboard')->with('message', 'Berhasil Submit Data!');
        }
    }

    public function ubahdatawebinar($id)
    {
        $session = session();
        $webinar = new webinarModel();
        $data = [
            'data' => $webinar->where('id',$id)->find()
        ];
        echo view('admin/side',$data);
        echo view('admin/topbar');
        echo view('ubahdatawebinar');
        echo view('admin/footer');
    }
    public function ubahdatastorewebinar()
    {
        $session = session();
        $ubahwebinar = new webinarModel();
            $data = [
                'judul'=> $this->request->getPost('judul'),
                'waktu' => $this->request->getPost('waktu'),
                'deskwebinar' => $this->request->getPost('deskwebinar'),
                'namapemateri' => $this->request->getPost('namapemateri'),
                'deskpemateri' => $this->request->getPost('deskpemateri'),
               
            ];
        $id = $this->request->getPost('id');
        $update = $ubahwebinar->update($id, $data);
        if($update){
            return redirect()->to('/datawebinar')->with('message', 'Update Berhasil!');
        }else{
            return redirect()->to('ubahdatawebinar')->with('message', 'Update Gagal!');
        }
            $ubahwebinar->save($data);
            return redirect()->to('/datawebinar')->with('message', 'Berhasil Submit Data!');
        
    }

    public function hapusdatawebinar($id)
    {
        $session = session();
        $user = new webinarModel();
        $data = $user->delete($id);
        if($data){
            return redirect()->back()->with('message', 'Berhasil Hapus data!');
        }else{
            return redirect()->back()->with('message', 'Gagal Hapus data!');
        }
    }

    public function datapeserta($id_webinar=NULL)
    {
        $datapeserta = new pendaftaranmodel();
        $data = ['datapeserta' => $datapeserta->WHERE('id_webinar', $id_webinar)->find()];

        echo View('admin/side');
        echo View('admin/topbar');
        echo View('datapeserta',$data);
        echo View('admin/footer');
    }

    public function datapresensi($id_webinar=NULL)
    {
        $datapresensi = new presensiModel();
        $data = ['datapresensi' => $datapresensi->WHERE('id_webinar', $id_webinar)->find()];

        echo View('admin/side');
        echo View('admin/topbar');
        echo View('datapresensi',$data);
        echo View('admin/footer');
    }

    public function datanotifikasi($id_webinar=NULL)
    {
        $datanotifikasi = new notifikasiModel();
        $data = ['datanotifikasi' => $datanotifikasi->WHERE('id_webinar', $id_webinar)->find()];

        echo View('admin/side');
        echo View('admin/topbar');
        echo View('datanotifikasi',$data);
        echo View('admin/footer');
    }

    public function tambahdatanotifikasi()
    {
        echo View('admin/side');
        echo View('admin/topbar');
        echo View('tambahdatanotifikasi');
        echo View('admin/footer');
    }
    
    public function storetambahdatanotifikasi()
    {
        $tambahdata = new notifikasiModel();
        $materi = $this->request->getFile('materi');
        if(!$materi->hasMoved()) {
            $newmateri = $materi->getRandomName();
            $filepath = ROOTPATH.'public/assets/materi/';
            $materi->move($filepath,$newmateri);

            $data = [
                'id_webinar' => $this->request->getPost('id_webinar'),
                'linkwebinar'=> $this->request->getPost('linkwebinar'),
                'linkpresensi' => $this->request->getPost('linkpresensi'),
                'pesan' => $this->request->getPost('pesan'),
                'pesanwa' => $this->request->getPost('pesanwa'),
                'materi' => $newmateri,
            ];
            $tambahdata->save($data);
            return redirect()->to('/datanotifikasi')->with('message', 'Berhasil Submit Data!');
        }
    }
    public function ubahdatanotifikasi($id)
    {
        $session = session();
        $webinar = new notifikasiModel();
        $data = [
            'data' => $webinar->where('id',$id)->find()
        ];
        echo view('admin/side',$data);
        echo view('admin/topbar');
        echo view('ubahdatanotifikasi');
        echo view('admin/footer');
    }
    public function ubahdatastorenotifikasi()
    {
        $session = session();
        $ubahnotifikasi = new notifikasiModel();
            $data = [
                
                'linkwebinar' => $this->request->getPost('linkwebinar'),
                'linkpresensi' => $this->request->getPost('linkpresensi'),
                'pesan' => $this->request->getPost('pesan'),
               
            ];
        $id = $this->request->getPost('id');
        $update = $ubahnotifikasi->update($id, $data);
        if($update){
            return redirect()->to('/datanotifikasi')->with('message', 'Update Berhasil!');
        }else{
            return redirect()->to('ubahdatanotifikasi')->with('message', 'Update Gagal!');
        }
            $ubahnotifikasi->save($data);
            return redirect()->to('/datanotifikasi')->with('message', 'Berhasil Submit Data!');
    }

    public function hapusdatanotifikasi($id)
    {
        $session = session();
        $user = new notifikasiModel();
        $data = $user->delete($id);
        if($data){
            return redirect()->to('/datanotifikasi')->with('message', 'Berhasil Hapus data!');
        }else{
            return redirect()->back('/datanotifikasi')->with('message', 'Gagal Hapus data!');
        }
    }

    public function downloadmateri()
    {
        // Load model yang dibutuhkan
        $berkasModel = new NotifikasiModel();

        // Ambil data berkas dari database
        $data['berkas'] = $berkasModel->findAll();

        // Panggil view untuk menampilkan daftar berkas
        return view('serifikat', $data);
    }

    public function download($id)
    {
        // Load model yang dibutuhkan
        $berkasModel = new NotifikasiModel();

        // Cari berkas berdasarkan ID
        $berkas = $berkasModel->find($id);

        // Pastikan berkas ditemukan
        if ($berkas) {
            // Ambil path berkas dari database
            $file_path = $berkas['public/assets/materi/'];
            $file_name = $berkas['nama_berkas'];

            // Set header untuk response
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $file_name . '"');

            // Baca file dan kirimkan ke output
            readfile($file_path);
        } else {
            // Jika berkas tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
            echo "Berkas tidak ditemukan!";
        }
    }

    public function exportpeserta($id)
    {
        $datapeserta = new pendaftaranmodel();
        $data = $datapeserta->where('id_webinar', $id)->findAll();
        $db = db_connect();
        $query =$db->query("SELECT * FROM webinar")->getRow();
    
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama');
        $activeWorksheet->setCellValue('C1', 'Email');
        $activeWorksheet ->setCellValue('D1', 'Whatsapp');
        $activeWorksheet->setCellValue('E1', 'Alamat');
        $column = 2;
        $no = 1;
        // tulis data peserta ke cell
        foreach ($data as $key => $item) {
            $activeWorksheet->setCellValue('A' . $column, $no++);
            $activeWorksheet->setCellValue('B' . $column, $item['nama']);
            $activeWorksheet->setCellValue('C' . $column, $item['email']);
            $activeWorksheet->setCellValue('D' . $column, $item['nowa']);
            $activeWorksheet->setCellValue('E' . $column, $item['alamat']);
            $column++;
        }
        $activeWorksheet->getStyle('A1:E1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                           ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'bordeStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $activeWorksheet->getStyle('A1:E'.($no++))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        $file_name = 'data_peserta_webinar_' .$query->judul . date('YmdHis') . '.xlsx'; // Nama file Excel unik dengan timestamp
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-')
        $writer->save('assets/export/'. $file_name);
        return redirect()->to('assets/export/'. $file_name);
        
    }
    

    public function exportpresensi($id_webinar=NULL)
    {
        
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No')
                        ->setCellValue('B1', 'Nama')
                        ->setCellValue('C1', 'Email')
                        ->setCellValue('D1', 'Whatsapp')
                        ->setCellValue('E1', 'Alamat');
        $column = 2;
        $no = 1;
        // $data = json_decode($member->getBody());
        // tulis data mobil ke cell
        $datapresensi = new presensiModel();
        $data = $datapresensi->WHERE('id_webinar', $id_webinar)->findAll();
        foreach($data as $data) {
            $activeWorksheet->setCellValue('A' . $column, $no++)
                        ->setCellValue('B' . $column, $data['nama'])
                        ->setCellValue('C' . $column, $data['email'])
                        ->setCellValue('D' . $column, $data['nowa'])
                        ->setCellValue('E' . $column, $data['alamat']);
            $column++;
        }

        $activeWorksheet->getStyle('A1:E1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                           ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'bordeStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $activeWorksheet->getStyle('A1:E'.($no++))->applyFromArray($styleArray);

        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        $file_name = 'data_presensi_webinar_' . date('YmdHis') . '.xlsx'; // Nama file Excel unik dengan timestamp
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-')
        $writer->save('assets/export/'. $file_name);
        return redirect()->to('assets/export/'. $file_name);
        
    }
    
}

?>