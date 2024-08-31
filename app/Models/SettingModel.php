<?php
/**
 * PHP Version 8.2.21
 *
 * @category SettingModel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * SettingModel class
 *
 * @category SettingModel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class SettingModel extends Model
{
        
    /**
     * GetSetting
     *
     * @param mixed $key key
     *
     * @return void
     */
    public function getSetting($key)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('setting');
        
        $builder->select('setting.key, setting.value');
        $builder->where('setting.key', $key);
        
        $query = $builder->get();
        
        return (isset($query->getRow()->value) ? $query->getRow()->value : '');
    }
        
    /**
     * EditSetting
     *
     * @return void
     */
    public function editSetting()
    {
        $db      = \Config\Database::connect();
        
        $cms_name = $db->table('setting');
        $cms_name->where('key', 'cms-name');
        $cms_name->update(array('value'=>$_POST['cms_name']));
        
        $cms_version = $db->table('setting');
        $cms_version->where('key', 'cms-version');
        $cms_version->update(array('value'=>$_POST['cms_version']));
        
        $framework = $db->table('setting');
        $framework->where('key', 'framework');
        $framework->update(array('value'=>$_POST['framework']));
        
        $php_version = $db->table('setting');
        $php_version->where('key', 'php-version');
        $php_version->update(array('value'=>$_POST['php_version']));
        
        $title = $db->table('setting');
        $title->where('key', 'title');
        return $title->update(array('value'=>$_POST['title']));
    }
}
