<?php
/**
 * PHP Version 8.2.21
 *
 * @category Barang
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Barang class
 *
 * @category Barang
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Barang extends Migration
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
            'kode'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '25'
            ],
            'nama'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'satuan'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'stok'    => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'harga'    => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
            ]
        );

        $this->forge->addKey('id', true);
        $this->forge->createTable('barang', true);
    }
    
    /**
     * Down
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
