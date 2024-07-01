<?php namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
        return view('admin/dashboard');
    }

}
