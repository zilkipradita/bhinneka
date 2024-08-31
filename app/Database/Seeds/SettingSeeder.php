<?php
/**
 * PHP Version 8.2.21
 *
 * @category SettingSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * SettingSeeder class
 *
 * @category SettingSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class SettingSeeder extends Seeder
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        $data['key']   = "cms-name";
        $data['value'] = "CMS C14";
        $this->db->table('setting')->insert($data);

        $data = array();
        $data['key']   = "cms-version";
        $data['value'] = "1.1";
        $this->db->table('setting')->insert($data);
        
        $data = array();
        $data['key']   = "framework";
        $data['value'] = "Codeigniter 4";
        $this->db->table('setting')->insert($data);
        
        $data = array();
        $data['key']   = "php-version";
        $data['value'] = "8.0.30";
        $this->db->table('setting')->insert($data);
        
        $data = array();
        $data['key']   = "title";
        $data['value'] = "Bhinneka";
        $this->db->table('setting')->insert($data);
    }
}
