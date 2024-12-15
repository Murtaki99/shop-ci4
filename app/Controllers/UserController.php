<?php

namespace App\Controllers;

use App\Models\User;
use Config\Services;
use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\OrderDetail;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $user;
    protected $sessionId;
    protected $order;
    protected $orderDetail;

    public function __construct()
    {
        $this->sessionId    = Services::session();
        $this->user         = new User();
        $this->order       = new Order();
        $this->orderDetail  = new OrderDetail();
    }

    public function index()
    {
        $userId = $this->sessionId->get('user_id');
        $user = $this->user->where('id', $userId)->first();
        $data = [
            'title' => 'Profile',
            'user'  => $user
        ];
        return view('/pages/profile/index', $data);
    }

    public function myorders()
    {
        $userId = $this->sessionId->get('user_id');
        $orders = $this->order->where('id_user', $userId)->orderBy('id', 'desc')->get()->getResult();
        $data = [
            'title' => 'Daftar Pesanan',
            'orders'  => $orders
        ];
        return view('/pages/profile/myorders', $data);
    }

    public function detail(int $id)
    {
        $order = $this->order->where('id', $id)->first();

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pesanan tidak ditemukan.');
        }

        $details = $this->orderDetail
            ->select('order_details.*, products.name as product_name, products.price as product_price, products.image as product_image')
            ->join('products', 'products.id = order_details.id_product', 'left')
            ->where('id_order', $order['id'])
            ->findAll();

        $data = [
            'title'   => 'Detail Pesanan: ',
            'order'   => $order,
            'details' => $details,
        ];

        return view('/pages/profile/detail-myorder', $data);
    }
}
