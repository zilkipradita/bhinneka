<?php
/**
 * PHP Version 8.2.21
 *
 * @category Dashboard
 * @package  Dashboard
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Models\LoginModel;

/**
 * Dashboard class
 *
 * @category Dashboard
 * @package  Dashboard
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Dashboard extends BaseController
{
        
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $login = new LoginModel;
                
        $data = array();
        $data['countUserLevel'] = $login->getCountUserLevel();
        $data['countUser1']     = $login->getCountUser('1');
        $data['countBarang']    = $login->getCountBarang();
        $data['countTransaksi'] = $login->getCountTransaksi();
        
        $data['main'] = view('dashboard/main', $data);
            
        return view('dashboard/home', $data);
    }
}
