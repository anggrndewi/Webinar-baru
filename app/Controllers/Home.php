<?php

namespace App\Controllers;
use App\Model\pendaftaranmodel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
