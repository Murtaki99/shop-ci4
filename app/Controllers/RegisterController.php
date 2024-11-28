<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RegisterController extends BaseController
{
    protected $userModel;
    protected $validation;

    public function __construct()
    {
        // Inisialisasi UserModel
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation(); // Initialize validation service
    }

    // Menampilkan Form Pendaftaran
    public function showFormRegister()
    {
        $data = [
            'title' => 'Daftar Akun',
        ];
        return view('pages/auth/register', $data);
    }

    public function register()
    {
        $this->validation->setRules([
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]',
            'password_confirmation' => 'matches[password]',
        ]);
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
        $userData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        if ($this->userModel->save($userData)) {
            $userId = $this->userModel->insertID();
            $user = $this->userModel->find($userId);
            session()->set([
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'user_email' => $user['email'],
                'logged_in' => true
            ]);
            session()->setFlashdata('success', 'Registrasi berhasil!');
            return redirect()->to('/');
        } else {
            session()->setFlashdata('error', 'Registrasi gagal. Silakan coba lagi.');
            return redirect()->back()->withInput();
        }
    }
}
