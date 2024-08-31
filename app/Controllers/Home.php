<?php
/**
 * PHP Version 8.2.21
 *
 * @category Home
 * @package  Home
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\SettingModel;

/**
 * Home class
 *
 * @category Home
 * @package  Home
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Home extends BaseController
{
        
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        if (session()->get('logged_in')==true) {
            return redirect()->to(base_url('dashboard'));
        } else {
            $setting = new SettingModel;
            
            $data=array();
            $data['cms_name'] = $setting->getSetting('cms-name');
            $data['cms_version'] = $setting->getSetting('cms-version');
            $data['title'] = $setting->getSetting('title');
            
            return view('login', $data);
        }
    }
        
    /**
     * DoLogin
     *
     * @return void
     */
    public function doLogin()
    {
        if (!$this->validate(
            [
            'username' => ['label' => 'Username', 'rules' => 'required'],
            'password' => ['label' => 'Password', 'rules' => 'required'],
            ]
        )
        ) {
            
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            
            $user = new LoginModel;
            $setting = new SettingModel;
            if ($user->getUser($username)->getNumRows()>0) {
                
                $dataUser = $user->getUser($username)->getRow();
                if (password_verify($password, $dataUser->password)) {
                    
                    session()->set(
                        [
                        'username'        => $dataUser->username,
                        'id_user_level'   => $dataUser->id_user_level,
                        'nama_user_level' => $dataUser->nama_user_level,
                        'nama'            => $dataUser->nama,
                        'title'           => $setting->getSetting('title'),
                        'cms_name'        => $setting->getSetting('cms-name'),
                        'cms_version'     => $setting->getSetting('cms-version'),
                        'logged_in'       => true
                        ]
                    );
                    
                    return redirect()->to(base_url('dashboard'));
                } else {
                    session()->setFlashdata('error', 'Password yang anda masukan salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('error', 'Username tidak ditemukan');
                return redirect()->back();
            }
        }
    }
        
    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        $session = session();
        $session->destroy();
        
        return redirect()->to('/');
    }
}
