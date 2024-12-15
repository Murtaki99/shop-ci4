<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\User;
use Config\Database;
use Config\Services;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CheckoutController extends BaseController
{
    protected $cart;
    protected $product;
    protected $user;
    protected $sessionId;
    protected $order;
    protected $orderDetail;
    protected $validation;

    public function __construct()
    {
        $this->sessionId    = Services::session();
        $this->validation   = Services::validation();
        $this->cart         = new Cart();
        $this->product      = new Product();
        $this->user         = new User();
        $this->order        = new Order();
        $this->orderDetail  = new OrderDetail();
    }

    public function index()
    {
        $userId = $this->sessionId->get('user_id');
        $products = $this->cart
            ->select('carts.*, products.name as product_name, products.price as product_price, products.image as product_image')
            ->join('products', 'products.id = carts.product_id', 'left')
            ->where('user_id', $userId)
            ->get()
            ->getResult();
        $total = array_sum(array_map(function ($product) {
            return $product->product_price * $product->quantity;
        }, $products));

        $data = [
            'title' => 'Data Pengiriman',
            'products' => $products,
            'total' => $total,
            'action'        => base_url('/checkout/store'),
        ];
        return view('pages/checkout/checkout', $data);
    }

    public function store()
    {
        $this->validation->setRules([
            'name'    => 'required|max_length[255]',
            'address' => 'required',
            'phone'   => 'required|numeric|min_length[10]|max_length[15]',
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        $userId = $this->sessionId->get('user_id');

        // Ambil data dari keranjang berdasarkan user
        $cartItems = $this->cart
            ->select('carts.*, products.price as product_price')
            ->join('products', 'products.id = carts.product_id', 'left')
            ->where('user_id', $userId)
            ->get()
            ->getResult();

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong!');
        }

        // Hitung total harga
        $total = array_sum(array_map(function ($item) {
            return $item->product_price * $item->quantity;
        }, $cartItems));

        // Generate nomor invoice unik
        $invoice = 'INV-' . strtoupper(uniqid());

        // Insert ke tabel orders
        $orderData = [
            'id_user'  => $userId,
            'date'     => date('Y-m-d H:i:s'),
            'invoice'  => $invoice,
            'total'    => $total,
            'name'     => $this->request->getPost('name'),
            'address'  => $this->request->getPost('address'),
            'phone'    => $this->request->getPost('phone'),
        ];

        // Mulai transaksi
        $db = Database::connect();
        $db->transStart();

        $this->order->insert($orderData);
        $orderId = $this->order->getInsertID();

        // Insert ke tabel order_details
        $orderDetails = [];
        foreach ($cartItems as $item) {
            $orderDetails[] = [
                'id_order'   => $orderId,
                'id_product' => $item->product_id,
                'quantity'   => $item->quantity,
                'subtotal'   => $item->product_price * $item->quantity,
            ];
        }
        $this->orderDetail->insertBatch($orderDetails);

        // Hapus keranjang setelah checkout
        $this->cart->where('user_id', $userId)->delete();

        // Commit atau rollback transaksi
        if ($db->transComplete()) {
            session()->setFlashdata('success', 'Checkout berhasil, Silahkan melakukan pembayaran!');
            return redirect()->to(base_url('/checkout/payment'));
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data pesanan.');
            return redirect()->back()->withInput();
        }
    }

    public function payment()
    {
        $userId = $this->sessionId->get('user_id');
        $order = $this->order->where('id_user', $userId)->orderBy('date', 'desc')->first();

        if (!$order) {
            return redirect()->to('/')->with('error', 'Tidak ada pesanan ditemukan!');
        }

        $data = [
            'title' => 'Checkout Berhasil',
            'order' => $order,
        ];

        return view('pages/checkout/payment', $data);
    }
}
