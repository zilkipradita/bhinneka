<?php
/**
 * PHP Version 8.2.21
 *
 * @category UserModel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * UserModel class
 *
 * @category UserModel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class UserModel extends Model
{
        
    /**
     * GetUser
     *
     * @return void
     */
    public function getUser()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
        
        $builder->select('user.*, user_level.nama_user_level');
        $builder->join('user_level', 'user_level.id_user_level = user.id_user_level', 'inner');
        
        if (session()->get('id_user_level')=='2') {
            $builder->whereNotIn('user.id_user_level', array('1'));
        }
        
        $builder->orderBy('user.id_user_level', 'ASC');
        
        return $query = $builder->get();
    }
        
    /**
     * GetEditUser
     *
     * @param mixed $username username
     *
     * @return void
     */
    public function getEditUser($username)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
        
        $builder->select('user.*');
        $builder->join('user_level', 'user_level.id_user_level = user.id_user_level', 'inner');
        $builder->where('user.username', $username);
        
        return $query = $builder->get();
    }
        
    /**
     * EditUser
     *
     * @param mixed $username username
     * @param mixed $data     data
     *
     * @return void
     */
    public function editUser($username, $data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
        $builder->where('username', $username);
        
        return $builder->update($data);
    }
        
    /**
     * DeleteUser
     *
     * @param mixed $username username
     *
     * @return void
     */
    public function deleteUser($username)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
        $builder->where('username', $username);
        
        return $builder->delete();
    }
        
    /**
     * SaveUser
     *
     * @param mixed $data data
     *
     * @return void
     */
    public function saveUser($data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user');
          
        return $builder->insert($data);
    }
}
