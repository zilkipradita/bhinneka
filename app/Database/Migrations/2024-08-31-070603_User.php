<?php
/**
 * PHP Version 8.2.21
 *
 * @category User
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * User class
 *
 * @category User
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class User extends Migration
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
            'id'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
                'unique'         => true
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'id_user_level' => [
                'type'           => 'INT',
                'constraint'     => '2',
                'unsigned'       => true,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'telp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'unique'         => true
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
        $this->forge->addForeignKey('id_user_level', 'user_level', 'id_user_level', '', 'CASCADE');
        $this->forge->createTable('user', true);
    }
    
    /**
     * Down
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('user');
    }
}
