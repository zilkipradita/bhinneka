<?php
/**
 * PHP Version 8.2.21
 *
 * @category TransaksiDetail
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * TransaksiDetail class
 *
 * @category TransaksiDetail
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class TransaksiDetail extends Migration
{
    /**
     * Up
     *
     * @return void
     */
    public function up()
    {
        
        $this->forge->addField(
            [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
            ],
            'id_barang' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
            ],
            'jumlah'    => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'harga'    => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'total'    => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'created_at datetime default current_timestamp',
            'created_by' => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
            ],
            'updated_at datetime default current_timestamp on update current_timestamp',
            'updated_by' => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
            ]
            ]
        );

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('id_barang', 'barang', 'id', '', 'CASCADE');
        $this->forge->createTable('transaksi_detail', true);
    }
    
    /**
     * Down
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('transaksi_detail');
    }
}
