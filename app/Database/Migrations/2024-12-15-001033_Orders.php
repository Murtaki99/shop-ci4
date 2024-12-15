<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_user'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'date'          => [
                'type'           => 'DATETIME',
            ],

            'invoice'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],

            'total'         => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],

            'name'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],

            'address'       => [
                'type'           => 'TEXT',
            ],

                'phone'         => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 15,
                ],

            'status'        => [
                'type'           => 'ENUM',
                'constraint'     => ['waiting', 'paid', 'delivered', 'cancel'],
                'default'        => 'waiting',
            ],

            'created_at'    => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],

            'updated_at'    => [
                'type'           => 'DATETIME',
                'null'           => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders', true);
    }
}
