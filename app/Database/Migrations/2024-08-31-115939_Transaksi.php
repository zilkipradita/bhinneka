<?php
/**
 * PHP Version 8.2.21
 *
 * @category Transaksi
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Transaksi class
 *
 * @category Transaksi
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Transaksi extends Migration
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
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'faktur'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'untuk'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '250'
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
        $this->forge->createTable('transaksi', true);
    }
    
    /**
     * Down
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
