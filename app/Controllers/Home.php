<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        if($this->session->has('sesusername')==""){
            return redirect()->to("Login");
        }else{
            return view('home');
        }
    }
}
