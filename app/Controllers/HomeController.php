<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        // session()->setFlashdata('success', 'Book has been updated!');
        $data = [
            'title' => 'Beranda'
        ];
        return view('pages/home/index', $data);
    }
}
