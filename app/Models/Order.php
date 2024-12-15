<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $table            = 'orders';
    protected $allowedFields    = ['id_user', 'date', 'invoice', 'total', 'name', 'address', 'phone', 'status'];
}
