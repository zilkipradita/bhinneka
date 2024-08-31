<?php
/**
 * PHP Version 8.2.21
 *
 * @category BarangSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * BarangSeeder class
 *
 * @category BarangSeeder
 * @package  Seeder
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class BarangSeeder extends Seeder
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        $data['id']     = "1";
        $data['kode']   = "PR01";
        $data['nama']   = "Ban Luar";
        $data['satuan'] = "Pcs";
        $data['harga']  = "2300000";
        $data['stok']   = "100";
        $this->db->table('barang')->insert($data);

        $data = array();
        $data['id']     = "2";
        $data['kode']   = "PR02";
        $data['nama']   = "Baut Ukuran 18";
        $data['satuan'] = "Dus";
        $data['harga']  = "110000";
        $data['stok']   = "1000";
        $this->db->table('barang')->insert($data);

        $data = array();
        $data['id']     = "3";
        $data['kode']   = "PR03";
        $data['nama']   = "Oli Mesin";
        $data['satuan'] = "Liter";
        $data['harga']  = "125000";
        $data['stok']   = "500";
        $this->db->table('barang')->insert($data);
    }
}
