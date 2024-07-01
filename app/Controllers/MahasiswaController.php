<?php namespace App\Controllers;

class MahasiswaController extends BaseController
{
    public function index()
    {
        return view('mahasiswa/dashboard');
    }
}
