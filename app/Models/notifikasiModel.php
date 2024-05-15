<?php

namespace App\Models;

use CodeIgniter\Model;

class notifikasiModel extends Model
{
    protected $table      = 'notifikasi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_webinar', 'linkpresensi', 'linkwebinar', 'pesan', 'pesanwa', 'materi'];
}