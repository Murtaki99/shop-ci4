<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function showFormLogin()
    {
        $data = [
            'title' => 'Masuk'
        ];
        return view('pages/auth/login', $data);
    }
}
