<?php
/**
 * PHP Version 8.2.21
 *
 * @category Setting
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Models\SettingModel;

/**
 * Setting class
 *
 * @category Setting
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Setting extends BaseController
{
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        if (session()->get('id_user_level')=='1') {
            
            $setting = new SettingModel;
            
            $data = array();
            $data['title_form']  = 'Setting';
            $data['cms_name']    = $setting->getSetting('cms-name');
            $data['cms_version'] = $setting->getSetting('cms-version');
            $data['framework']   = $setting->getSetting('framework');
            $data['php_version'] = $setting->getSetting('php-version');
            $data['title']       = $setting->getSetting('title');
            
            $data['main'] = view('setting/main', $data);
            
            return view('dashboard/home', $data);
        } else {
            return redirect()->to('/');
        }
    }
        
    /**
     * Update
     *
     * @return void
     */
    public function update()
    {
        if (session()->get('id_user_level')=='1') {
            
            if (!$this->validate(
                [
                'cms_name' => ['label' => 'CMS Name', 'rules' => 'required|max_length[150]'],
                'cms_version' => ['label' => 'CMS Version', 'rules' => 'required|max_length[150]'],
                'framework' => ['label' => 'Framework', 'rules' => 'required|max_length[150]'],
                'php_version' => ['label' => 'PHP Version', 'rules' => 'required|max_length[150]'],
                'title' => ['label' => 'Title', 'rules' => 'required|max_length[150]'],
                ]
            )
            ) {
                
                echo $this->validator->listErrors();
            } else {
                $setting = new SettingModel;
                
                if ($setting->editSetting($_POST)) {
                    echo '1';
                } else {
                    echo '2';
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
}
