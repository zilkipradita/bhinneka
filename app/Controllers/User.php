<?php
/**
 * PHP Version 8.2.21
 *
 * @category User
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserLevelModel;

/**
 * User class
 *
 * @category User
 * @package  Admin_Panel
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class User extends BaseController
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
            $data['title_form'] = 'User';
            $data['main'] = view('user/main', $data);
                
            return view('dashboard/home', $data);
        } else {
            return redirect()->to('/');
        }
    }
        
    /**
     * Edit
     *
     * @param mixed $username username
     *
     * @return void
     */
    public function edit($username="")
    {
        if (session()->get('id_user_level')=='1') {
            if ($username=="") {
                session()->setFlashdata('error', 'Username tidak ada');
                return redirect()->to('user');
            } else {
                $user = new UserModel;
                $user_level = new UserLevelModel;
                
                if ($user->getEditUser($username)->getNumRows()>0) {
                    
                    $data=array();
                    $data['title_form'] = 'User';
                    $data['getEditUser']   = $user->getEditUser($username);
                    $data['getUserLevel']  = $user_level->getUserLevel();
                    
                    $data['main'] = view('user/edit', $data);
                
                    return view('dashboard/home', $data);
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan');
                    return redirect()->to('user');
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

            $id = $this->request->getPost('id');
            
            if (!$this->validate(
                [
                'id' => ['label' => 'Level', 'rules' => 'required'],
                'id_user_level' => ['label' => 'Level', 'rules' => 'required'],
                'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]|min_length[5]'],
                'telp' => ['label' => 'Telepon', 'rules' => 'required|numeric|max_length[20]'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email|max_length[50]|is_unique[user.email,id,{id}]'],
                ]
            )
            ) {
                
                echo $this->validator->listErrors();
            } else {
                
                $user = new UserModel;
        
                $username = $this->request->getPost('username');
                
                $data=array();
                $data['nama']          = $this->request->getPost('nama');
                $data['id_user_level'] = $this->request->getPost('id_user_level');
                $data['telp']          = $this->request->getPost('telp');
                $data['email']         = $this->request->getPost('email');
                $data['updated_at']    = date('Y:m:d H:i:s');
                $data['updated_by']    = session()->get('username');
                
                if ($user->editUser($username, $data)) {
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
     * Delete
     *
     * @param mixed $username username
     *
     * @return void
     */
    public function delete($username="")
    {
        if (session()->get('id_user_level')=='1') {
            if ($username=="") {
                session()->setFlashdata('error', 'Username tidak ada');
                return redirect()->to('user');
            } else {
                if ($username<>session()->get('username')) {
                    $user = new UserModel;
                    if ($user->getEditUser($username)->getNumRows()>0) {
                        if ($user->deleteUser($username)) {
                            session()->setFlashdata('info', 'Data berhasil dihapus');
                            return redirect()->to('user');
                        } else {
                            session()->setFlashdata('error', 'Data gagal dihapus');
                            return redirect()->to('user');
                        }
                    } else {
                        session()->setFlashdata('error', 'Data tidak ditemukan');
                        return redirect()->to('user');
                    }
                } else {
                    return redirect()->to('user');
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
        
    /**
     * Add
     *
     * @return void
     */
    public function add()
    {
        if (session()->get('id_user_level')=='1') {
            
            $user_level = new UserLevelModel;
            
            $data=array();
            $data['title_form'] = 'User';
            $data['getUserLevel'] = $user_level->getUserLevel();
                    
            $data['main'] = view('user/add', $data);
                
            return view('dashboard/home', $data);
        } else {
            return redirect()->to('/');
        }
    }
        
    /**
     * Save
     *
     * @return void
     */
    public function save()
    {
        if (session()->get('id_user_level')=='1') {
                
            if (!$this->validate(
                [
                'username' => ['label' => 'Username', 'rules' => 'required|max_length[25]|min_length[5]'],
                'password' => ['label' => 'Password', 'rules' => 'required|max_length[20]|min_length[8]'],
                'password2' => ['label' => 'Konfirmasi Password', 'rules' => 'required|matches[password]'],
                'id_user_level' => ['label' => 'Level', 'rules' => 'required'],
                'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]|min_length[5]'],
                'telp' => ['label' => 'Telepon', 'rules' => 'required|numeric|max_length[20]'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email|max_length[50]|is_unique[user.email]'],
                ]
            )
            ) {
                
                echo $this->validator->listErrors();
            } else {
                
                $user = new UserModel;
                
                if ($user->getEditUser($this->request->getPost('username'))->getNumRows()>0) {
                    echo '3';
                } else {
                    $data['username'] = $this->request->getPost('username');
                    $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
                    $data['id_user_level'] = $this->request->getPost('id_user_level');
                    $data['nama'] = $this->request->getPost('nama');
                    $data['telp']          = $this->request->getPost('telp');
                    $data['email']         = $this->request->getPost('email');
                    $data['created_at']    = date('Y:m:d H:i:s');
                    $data['created_by']    = session()->get('username');
                    
                    if ($user->saveUser($data)) {
                        echo '1';
                    } else {
                        echo '2';
                    }
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
            $user = new UserModel;
            $getUser = $user->getUser();
            
            $x=0;
            $data = array();
            foreach ($getUser->getResult() as $user) {
                
                $edit = "<a style='color:#6c757d;font-weight:bold' href=".base_url('user/edit/'.$user->username).">Edit</a>";
                $confirm_teks = 'Apakah ingin menghapus data ini ? ('.$user->username.')';
                $delete = "<a style='color:#6c757d;font-weight:bold' href=".base_url('user/delete/'.$user->username)." onclick=\"javascript:return confirm('$confirm_teks')\">Delete</a>";
                
                $data[$x]['id'] = $user->id;
                $data[$x]['username'] = $user->username;
                $data[$x]['nama_user_level'] = $user->nama_user_level;
                $data[$x]['nama'] = $user->nama;
                $data[$x]['telp'] = $user->telp;
                $data[$x]['email'] = $user->email;
                
                if ($user->username==session()->get('username')) {
                    $data[$x]['action'] = "<div style='text-align: center;'>".$edit."</div>";
                } else {
                    $data[$x]['action'] = "<div style='text-align: center;'>".$edit." | ".$delete."</div>";
                }
                
                $x++;
            }
            
            echo json_encode(array("data"=>$data));
        } else {
            return redirect()->to('/');
        }
    }
}
