<?php

namespace App\Controllers;

use App\Models\User;
use Config\Services;
use App\Controllers\BaseController;

class AdminUserController extends BaseController
{
    protected $user;
    protected $validation;

    public function __construct()
    {
        $this->user = new User();
        $this->validation = Services::validation();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        if ($search) {
            $users = $this->user->like('name', $search)->paginate(10);
        } else {
            $users = $this->user->orderBy('id', 'desc')->paginate(10);
        }
        $data = [
            'title' => 'Daftar Pengguna',
            'users' => $users,
            'pager' => $this->user->pager,
        ];
        return view('pages/admin/user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'action' => base_url('/users/store'),
        ];
        return view('pages/admin/user/create', $data);
    }

    public function show()
    {
        // Display the specified resource
    }

    public function store()
    {
        $this->validation->setRules([
            'name'          => 'required|max_length[255]',
            'email'         => 'required|max_length[255]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[6]',
            'role'          => 'required',
            'status'        => 'required',
            'image'         => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]',
        ]);
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        $imageName = '';

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('storage/users', $imageName);
        }

        $user = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
            'is_active' => $this->request->getPost('status'),
            'image' => $imageName,
        ];
        if ($this->user->save($user)) {
            session()->setFlashdata('success', 'Pengguna baru berhasil disimpan!');
            return redirect()->to('/users');
        } else {
            session()->setFlashdata('error', 'Pengguna baru gagal disimpan');
            return redirect()->to('/users/create');
        }
    }

    public function edit()
    {
        // Show the form for editing the specified resource
    }

    public function update()
    {
        // Update the specified resource in storage
    }

    public function destroy()
    {
        // Remove the specified resource from storage
    }
}
