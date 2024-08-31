<?php
/**
 * PHP Version 8.2.21
 *
 * @category Setting
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Setting class
 *
 * @category Setting
 * @package  Migration
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Setting extends Migration
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
            'key'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '25'
            ],
            'value'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ]
            ]
        );

        $this->forge->addKey('key', true);
        $this->forge->createTable('setting', true);
    }
    
    /**
     * Down
     *
     * @return void
     */
    public function down()
    {
        $this->forge->dropTable('setting');
    }
}
