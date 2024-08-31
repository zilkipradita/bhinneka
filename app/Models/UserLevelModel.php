<?php
/**
 * PHP Version 8.2.21
 *
 * @category UserLevelModel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * UserLevelModel class
 *
 * @category UserLevelModel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class UserLevelModel extends Model
{
        
    /**
     * GetUserLevel
     *
     * @return void
     */
    public function getUserLevel()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user_level');
        $builder->select('id_user_level , nama_user_level');
        $builder->orderBy('id_user_level', 'ASC');
        
        return $query = $builder->get();
    }
        
    /**
     * GetEditUserLevel
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function getEditUserLevel($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user_level');
        $builder->select('id_user_level , nama_user_level');
        $builder->where('id_user_level', $id);
        
        return $query = $builder->get();
    }
        
    /**
     * EditUserLevel
     *
     * @param mixed $id   id
     * @param mixed $data data
     *
     * @return void
     */
    public function editUserLevel($id, $data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('user_level');
        $builder->where('id_user_level', $id);
        
        return $builder->update($data);
    }
}
