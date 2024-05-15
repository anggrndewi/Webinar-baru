<?php

namespace App\Models;

use CodeIgniter\Model;

class webinarModel extends Model
{
    protected $table      = 'webinar';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['judul', 'waktu', 'deskwebinar', 'poster', 'namapemateri', 'deskpemateri', 'foto_pemateri'];

}