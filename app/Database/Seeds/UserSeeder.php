<?php
/**
 * PHP Version 8.2.21
 *
 * @category UserSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * UserSeeder class
 *
 * @category UserSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class UserSeeder extends Seeder
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        $data['id']            = "1";
        $data['username']      = "admin";
        $data['password']      = password_hash("12345678", PASSWORD_BCRYPT);
        $data['id_user_level'] = "1";
        $data['nama']          = "Admin";
        $data['email']         = "admin@gmail.com";
        $this->db->table('user')->insert($data);
    }
}
