<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends BaseController
{

    protected $validation;
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelola Kategori',
        ];
        return view('pages/admin/category/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'action' => base_url('/categories/store')
        ];
        return view('pages/admin/category/create', $data);
    }

    public function store()
    {
        $this->validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]|is_unique[categories.name]',
            'slug'  => 'required|min_length[3]|max_length[255]|is_unique[categories.slug]'
        ]);
        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
        $category = [
            'name' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
        ];
        if ($this->category->save($category)) {
            session()->setFlashdata('success', 'Kategori berhasil disimpan!');
            return redirect()->to('/categories');
        } else {
            session()->setFlashdata('error', 'Kategori gagal disimpan');
            return redirect()->to('/categories/create');
        }
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Ubah Kategori',
            'action' => base_url('/categories/update')
        ];
    }
}
