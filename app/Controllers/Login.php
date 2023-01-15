<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Perusahaan_model;

class Login extends Controller
{
    protected $mperusahaan, $session;
    protected $table = "user";

    public function __construct()
    {
        $this->mperusahaan = new Perusahaan_model();

        $this->mperusahaan->setTable($this->table);
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('page/login');
    }

    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $where = [
            'username' => $username,
        ];

        $getDataId = $this->mperusahaan->getDataId($this->table, $where);

        foreach($getDataId as $data);

        if(password_verify($password, $data->password)){
            $dataSession = [
                'sesusername' => $data->username,
                'sesnama' => $data->nama,
            ];
            $this->session->set($dataSession);
            return redirect()->to('/');
        }else{
            echo "<script>alert('Username atau Password salah!'); window.location='" . base_url('login') . "'; </script>";
        }
    }
    
    function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }

}