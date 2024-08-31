<?php
/**
 * PHP Version 8.2.21
 *
 * @category UserLevel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Models\UserLevelModel;

/**
 * UserLevel class
 *
 * @category UserLevel
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class UserLevel extends BaseController
{
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        if (session()->get('id_user_level')=='1') {
            $data = array();
            $data['title_form'] = 'User Level';
            $data['main'] = view('userlevel/main', $data);
            
            return view('dashboard/home', $data);
        } else {
            return redirect()->to('/');
        }
    }
        
    /**
     * Edit
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function edit($id="")
    {
        if (session()->get('id_user_level')=='1') {
            if ($id=="") {
                session()->setFlashdata('error', 'ID tidak ada');
                return redirect()->to('userlevel');
            } else {
                $user = new UserLevelModel;
                if ($user->getEditUserLevel($id)->getNumRows()>0) {
                        
                    $data=array();
                    $data['title_form'] = 'User Level';
                    $data['getEditUserLevel'] = $user->getEditUserLevel($id);
                     
                    $data['main'] = view('userlevel/edit', $data);
                    
                    return view('dashboard/home', $data);
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan');
                    return redirect()->to('userlevel');
                }
            }
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

            $id_user_level = $this->request->getPost('id_user_level');

            if (!$this->validate(
                [
                'id_user_level' => ['label' => 'ID', 'rules' => 'required'],
                'nama_user_level' => ['label' => 'Nama', 'rules' => 'required|max_length[25]|is_unique[user_level.nama_user_level,id_user_level,{id_user_level}]'],
                ]
            )
            ) {
                
                echo $this->validator->listErrors();
            } else {
                $user = new UserLevelModel;
            
                $data['nama_user_level'] = $this->request->getPost('nama_user_level');
                    
                if ($user->editUserLevel($id_user_level, $data)) {
                    echo '1';
                } else {
                    echo '2';
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
        
    /**
     * Json
     *
     * @return void
     */
    public function json()
    {
        if (session()->get('id_user_level')=='1') {
            
            $user = new UserLevelModel;
            $getUserLevel = $user->getUserLevel();
            
            $x=0;
            $data = array();
            foreach ($getUserLevel->getResult() as $user_level) {
                
                $edit = "<a style='color:#6c757d;font-weight:bold' href=".base_url('userlevel/edit/'.$user_level->id_user_level).">Edit</a>";
                
                $data[$x]['id_user_level']   = "<div style='text-align: center;'>".$user_level->id_user_level."</div>";
                $data[$x]['nama_user_level'] = $user_level->nama_user_level;
                $data[$x]['action']          = "<div style='text-align: center;'>".$edit."</div>";
                
                $x++;
            }
            
            echo json_encode(array("data"=>$data));
        } else {
            return redirect()->to('/');
        }
    }
}
