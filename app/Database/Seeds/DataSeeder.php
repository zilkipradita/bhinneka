<?php
/**
 * PHP Version 8.2.21
 *
 * @category DataSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * DataSeeder class
 *
 * @category DataSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class DataSeeder extends Seeder
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserLevelSeeder');
        $this->call('UserSeeder');
        $this->call('SettingSeeder');
        $this->call('BarangSeeder');
    }
}
