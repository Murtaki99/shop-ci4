<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        // Creating the table
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'collation'      => 'utf8mb4_general_ci',
            ],
            'slug'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'collation'      => 'utf8mb4_general_ci',
                'unique'         => true,
            ],
            'created_at'  => [
                'type'           => 'DATETIME',
                'null'           => null
            ],
            'updated_at'  => [
                'type'           => 'DATETIME',
                'null'           => null
            ]
        ]);

        // Adding the primary key
        $this->forge->addKey('id'); // True indicates primary key

        // Create the table (replace 'products' with your actual table name)
        $this->forge->createTable('products');
    }


    public function down()
    {
        $this->forge->dropTable('products', true);
    }
}