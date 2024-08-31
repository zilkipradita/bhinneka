<?php
/**
 * PHP Version 8.2.21
 *
 * @category UserLevel
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * UserLevel class
 *
 * @category UserLevel
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class UserLevel extends Migration
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
            'id_user_level'          => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_user_level'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
                'unique'         => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
            ]
        );

        $this->forge->addKey('id_user_level', true);
        $this->forge->createTable('user_level', true);
    }
    
    /**
     * Down
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('user_level');
    }
}
