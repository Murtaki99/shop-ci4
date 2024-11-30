<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController extends BaseController
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index(): string
    {
        $search = $this->request->getGet('search');
        $this->product->select('products.*, categories.name as category')->join('categories', 'categories.id=products.category_id', 'left');
        if ($search) {
            $products = $this->product->like('products.name', $search)->paginate(6);
        } else {
            $products = $this->product->orderBy('products.id', 'desc')->paginate(6);
        }
        $data = [
            'title' => 'Kelola Produk',
            'products' => $products,
            'pager' => $this->product->pager,
        ];
        return view('pages/home/index', $data);
    }
}
