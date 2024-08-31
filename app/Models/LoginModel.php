<?php
/**
 * PHP Version 8.2.21
 *
 * @category LoginModel
 * @package  LoginModel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * LoginModel class
 *
 * @category LoginModel
 * @package  LoginModel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class LoginModel extends Model
{
        
    /**
     * GetUser
     *
     * @param mixed $username username
     *
     * @return void
     */
    public function getUser($username)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
        
        $builder->select('user.*, user_level.nama_user_level');
        $builder->join('user_level', 'user_level.id_user_level = user.id_user_level', 'inner');
        $builder->where('user.username', $username);
        
        return $query = $builder->get();
    }
        
    /**
     * GetCountUserLevel
     *
     * @return void
     */
    public function getCountUserLevel()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user_level');
        
        return $builder->countAll();
    }
        
    /**
     * GetCountUser
     *
     * @param mixed $level level
     *
     * @return void
     */
    public function getCountUser($level)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
        $builder->where('id_user_level', $level);
        
        return $builder->get()->getNumRows();
    }
    
    /**
     * GetCountBarang
     *
     * @return void
     */
    public function getCountBarang()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('barang');
        
        return $builder->get()->getNumRows();
    }

    /**
     * GetCountTransaksi
     *
     * @return void
     */
    public function getCountTransaksi()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi');
        
        return $builder->get()->getNumRows();
    }
}
