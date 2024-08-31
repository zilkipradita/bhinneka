<?php
/**
 * PHP Version 8.2.21
 *
 * @category Barang
 * @package  Master_Data
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BarangModel;

/**
 * Barang class
 *
 * @category Barang
 * @package  Master_Data
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Barang extends BaseController
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
            $data['title_form'] = 'Barang';
            $data['main'] = view('barang/main', $data);
                
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
                return redirect()->to('barang');
            } else {
                $barang = new BarangModel;
                
                if ($barang->getEditBarang($id)->getNumRows()>0) {
                    
                    $data=array();
                    $data['title_form']    = 'Barang';
                    $data['getEditBarang'] = $barang->getEditBarang($id);
                    
                    $data['main'] = view('barang/edit', $data);
                
                    return view('dashboard/home', $data);
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan');
                    return redirect()->to('barang');
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
                'id' => ['label' => 'ID', 'rules' => 'required'],
                'kode' => ['label' => 'Kode', 'rules' => 'required|max_length[25]'],
                'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[50]'],
                'satuan' => ['label' => 'Satuan', 'rules' => 'required|max_length[50]'],
                'stok' => ['label' => 'Stok', 'rules' => 'required'],
                'harga' => ['label' => 'Harga', 'rules' => 'required']
                ]
            )
            ) {
                echo $this->validator->listErrors();
            } else {
                $barang = new BarangModel;
        
                $data=array();
                $data['nama']       = $this->request->getPost('nama');
                $data['kode']       = $this->request->getPost('kode');
                $data['satuan']     = $this->request->getPost('satuan');
                $data['stok']       = $this->request->getPost('stok');
                $data['harga']      = $this->request->getPost('harga');
                $data['updated_at'] = date('Y:m:d H:i:s');
                
                if ($barang->editBarang($id, $data)) {
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
     * @param mixed $id id
     *
     * @return void
     */
    public function delete($id="")
    {
        if (session()->get('id_user_level')=='1') {
            if ($id=="") {
                session()->setFlashdata('error', 'ID tidak ada');
                return redirect()->to('barang');
            } else {
                $barang = new BarangModel;
                if ($barang->getEditBarang($id)->getNumRows()>0) {
                    if ($barang->deleteBarang($id)) {
                        session()->setFlashdata('info', 'Data berhasil dihapus');
                        return redirect()->to('barang');
                    } else {
                        session()->setFlashdata('error', 'Data gagal dihapus');
                        return redirect()->to('barang');
                    }
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan');
                    return redirect()->to('barang');
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
            $data=array();
            $data['title_form'] = 'Barang';
            $data['main'] = view('barang/add', $data);
                
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
                    'kode' => ['label' => 'Kode', 'rules' => 'required|max_length[25]'],
                    'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[50]'],
                    'satuan' => ['label' => 'Satuan', 'rules' => 'required|max_length[50]'],
                    'stok' => ['label' => 'Stok', 'rules' => 'required'],
                    'harga' => ['label' => 'Harga', 'rules' => 'required']
                ]
            )
            ) {
                echo $this->validator->listErrors();
            } else {
                $barang = new BarangModel;
                
                $data=array();
                $data['nama']       = $this->request->getPost('nama');
                $data['kode']       = $this->request->getPost('kode');
                $data['satuan']     = $this->request->getPost('satuan');
                $data['stok']       = $this->request->getPost('stok');
                $data['harga']      = $this->request->getPost('harga');
                $data['created_at'] = date('Y:m:d H:i:s');
                
                if ($barang->saveBarang($data)) {
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
            $barang = new BarangModel;
            $getBarang = $barang->getBarang();
            
            $x=0;
            $data = array();
            foreach ($getBarang->getResult() as $barang) {
                
                $edit = "<a style='color:#6c757d;font-weight:bold' href=".base_url('barang/edit/'.$barang->id).">Edit</a>";
                $confirm_teks = 'Apakah ingin menghapus data ini ? ('.$barang->id.')';
                $delete = "<a style='color:#6c757d;font-weight:bold' href=".base_url('barang/delete/'.$barang->id)." onclick=\"javascript:return confirm('$confirm_teks')\">Delete</a>";
                
                $data[$x]['id']     = $barang->id;
                $data[$x]['kode']   = $barang->kode;
                $data[$x]['nama']   = $barang->nama;
                $data[$x]['satuan'] = $barang->satuan;
                $data[$x]['harga']  = number_format($barang->harga, 2, ",", ".");
                $data[$x]['stok']   = number_format($barang->stok, 0, ",", ".");
                $data[$x]['action'] = "<div style='text-align: center;'>".$edit." | ".$delete."</div>";
                
                $x++;
            }
            
            echo json_encode(array("data"=>$data));
        } else {
            return redirect()->to('/');
        }
    }
}
