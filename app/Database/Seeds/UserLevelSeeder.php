<?php
/**
 * PHP Version 8.2.21
 *
 * @category UserLevelSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * UserLevelSeeder class
 *
 * @category UserLevelSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class UserLevelSeeder extends Seeder
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        $data['id_user_level']   = "1";
        $data['nama_user_level'] = "Admin";
        $this->db->table('user_level')->insert($data);

        $data = array();
        $data['id_user_level']   = "2";
        $data['nama_user_level'] = "User";
        $this->db->table('user_level')->insert($data);
    }
}
