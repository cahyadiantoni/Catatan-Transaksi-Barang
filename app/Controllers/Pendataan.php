<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pendataan_model;

class Pendataan extends Controller
{
    public function index()
    {
        $pendataan = new Pendataan_model();

        $getData = $pendataan->getdata();
        var_dump($getData);
    }
}
