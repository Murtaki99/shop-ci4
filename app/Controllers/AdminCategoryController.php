<?php

namespace App\Controllers;

use Config\Services;
use App\Models\Category;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class AdminCategoryController extends BaseController
{
    protected $validation;
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
        $this->validation = Services::validation();
    }
    public function index()
    {
        $search = $this->request->getGet('search');
        if ($search) {
            $categories = $this->category->like('name', $search)->paginate(10);
        } else {
            $categories = $this->category->orderBy('id', 'desc')->paginate(10);
        }
        $data = [
            'title' => 'Kelola Kategori',
            'categories' => $categories,
            'pager' => $this->category->pager,
        ];
        return view('pages/admin/category/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'action' => base_url('/categories/store'),
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

    public function edit(string $slug)
    {
        $category = $this->category->where('slug', $slug)->first();
        $data = [
            'title' => 'Ubah Kategori',
            'action' => base_url("/categories/update/{$category['slug']}"),
            'category' => $category,
        ];

        return view('pages/admin/category/edit', $data);
    }

    public function update(string $slug)
    {
        $category = $this->category->where('slug', $slug)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }
        $this->validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]|is_unique[categories.name,id,' . $category['id'] . ']',
            'slug'  => 'required|min_length[3]|max_length[255]|is_unique[categories.slug,id,' . $category['id'] . ']'
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
        $updateCategory = [
            'id'    => $category['id'],
            'name'  => $this->request->getPost('title'),
            'slug'  => $this->request->getPost('slug'),
        ];
        if ($this->category->save($updateCategory)) {
            session()->setFlashdata('success', 'Kategori berhasil diubah!');
            return redirect()->to('/categories');
        } else {
            session()->setFlashdata('error', 'Kategori gagal diubah');
            return redirect()->to('/categories/edit/' . $slug);
        }
    }

    public function destroy(string $slug)
    {
        $category = $this->category->where('slug', $slug)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }
        if ($this->category->delete($category['id'])) {
            return redirect()->to('/categories')->with('success', 'Kategori berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal dihapus!');
        }
    }
}