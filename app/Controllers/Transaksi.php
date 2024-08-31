<?php
/**
 * PHP Version 8.2.21
 *
 * @category Transaksi
 * @package  Transaksi
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiModel;
use App\Models\BarangModel;

/**
 * Transaksi class
 *
 * @category Transaksi
 * @package  Transaksi
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class Transaksi extends BaseController
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
            $data['title_form'] = 'Transaksi';
            $data['main'] = view('transaksi/main', $data);
                
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
                return redirect()->to('transaksi');
            } else {
                $transaksi = new TransaksiModel;
                $barang = new BarangModel;
                
                if ($transaksi->getEditTransaksi($id)->getNumRows()>0) {
                    
                    $data=array();
                    $data['title_form']       = 'Transaksi';
                    $data['getEditTransaksi'] = $transaksi->getEditTransaksi($id);
                    $data['getBarang']        = $barang->getBarang();
                    
                    $data['main'] = view('transaksi/edit', $data);
                
                    return view('dashboard/home', $data);
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan');
                    return redirect()->to('transaksi');
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
                'faktur' => ['label' => 'Faktur', 'rules' => 'required|max_length[100]'],
                'untuk' => ['label' => 'Untuk', 'rules' => 'required|max_length[250]']
                ]
            )
            ) {
                echo $this->validator->listErrors();
            } else {
                $transaksi = new TransaksiModel;
        
                $data=array();
                $data['faktur']     = $this->request->getPost('faktur');
                $data['untuk']      = $this->request->getPost('untuk');
                $data['updated_at'] = date('Y:m:d H:i:s');
                $data['updated_by'] = session()->get('username');
                
                if ($transaksi->editTransaksi($id, $data)) {
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
                return redirect()->to('transaksi');
            } else {
                $transaksi = new TransaksiModel;
                if ($transaksi->getEditTransaksi($id)->getNumRows()>0) {
                    if ($transaksi->deleteTransaksi($id)) {
                        session()->setFlashdata('info', 'Data berhasil dihapus');
                        return redirect()->to('transaksi');
                    } else {
                        session()->setFlashdata('error', 'Data gagal dihapus');
                        return redirect()->to('transaksi');
                    }
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan');
                    return redirect()->to('transaksi');
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
            $data['title_form'] = 'Transaksi';
            $data['main'] = view('transaksi/add', $data);
                
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
                    'faktur' => ['label' => 'Faktur', 'rules' => 'required|max_length[100]'],
                    'untuk' => ['label' => 'Untuk', 'rules' => 'required|max_length[250]']
                ]
            )
            ) {
                echo '3';
            } else {
                $transaksi = new TransaksiModel;
                
                $data=array();
                $data['faktur']     = $this->request->getPost('faktur');
                $data['untuk']      = $this->request->getPost('untuk');
                $data['created_at'] = date('Y:m:d H:i:s');
                $data['created_by'] = session()->get('username');

                $db      = \Config\Database::connect();
                $builder = $db->table('transaksi');
                
                if ($builder->insert($data)) {
                    echo $db->insertID();
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
            $transaksi = new TransaksiModel;
            $getTransaksi = $transaksi->getTransaksi();
            
            $x=0;
            $data = array();
            foreach ($getTransaksi->getResult() as $transaksi) {
                
                $edit = "<a style='color:#6c757d;font-weight:bold' href=".base_url('transaksi/edit/'.$transaksi->id).">Edit</a>";
                $confirm_teks = 'Apakah ingin menghapus data ini ? ('.$transaksi->id.')';
                $delete = "<a style='color:#6c757d;font-weight:bold' href=".base_url('transaksi/delete/'.$transaksi->id)." onclick=\"javascript:return confirm('$confirm_teks')\">Delete</a>";
                
                $data[$x]['id']     = "<div style='text-align: center;'>".$transaksi->id."</div>";
                $data[$x]['faktur'] = $transaksi->faktur;
                $data[$x]['untuk']  = $transaksi->untuk;
                $data[$x]['total']  = number_format($transaksi->total, 2, ",", ".");
                $data[$x]['action'] = "<div style='text-align: center;'>".$edit." | ".$delete."</div>";
                
                $x++;
            }
            
            echo json_encode(array("data"=>$data));
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Save
     *
     * @return void
     */
    public function saveDetail()
    {
        if (session()->get('id_user_level')=='1') {
            if (!$this->validate(
                [
                    'barang' => ['label' => 'Barang', 'rules' => 'required'],
                    'jumlah' => ['label' => 'Jumlah', 'rules' => 'required']
                ]
            )
            ) {
                echo $this->validator->listErrors();
            } else {
                $transaksi = new TransaksiModel;
                $barang = new BarangModel;

                if ($transaksi->getEditTransaksiDetail($this->request->getPost('id'), $this->request->getPost('barang'))->getNumRows()>0) {
                    echo "Barang tersebut sudah ditambahkan";
                } else {
                    $dataBarang = $barang->getEditBarang($this->request->getPost('barang'))->getRow();
                
                    $data=array();
                    $data['id_transaksi'] = $this->request->getPost('id');
                    $data['id_barang']    = $this->request->getPost('barang');
                    $data['jumlah']       = $this->request->getPost('jumlah');
                    $data['harga']        = $dataBarang->harga;
                    $data['total']        = (intval($this->request->getPost('jumlah')) * intval($dataBarang->harga));
                    $data['created_at']   = date('Y:m:d H:i:s');
                    $data['created_by']   = session()->get('username');
                    
                    if ($transaksi->saveTransaksiDetail($data)) {
    
                        $data=array();
                        $data['jumlah']     = $transaksi->getSumTransaksi('jumlah', $this->request->getPost('id'));
                        $data['harga']      = $transaksi->getSumTransaksi('harga', $this->request->getPost('id'));
                        $data['total']      = $transaksi->getSumTransaksi('total', $this->request->getPost('id'));
                        $data['updated_at'] = date('Y:m:d H:i:s');
                        $data['updated_by'] = session()->get('username');
                    
                        $transaksi->editTransaksi($this->request->getPost('id'), $data);
    
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
     * JsonDetail
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function jsonDetail($id)
    {
        if (session()->get('id_user_level')=='1') {
            $transaksi = new TransaksiModel;
            $getTransaksi = $transaksi->getBarangbyTransaksi($id);
            
            $x=0;
            $data = array();
            foreach ($getTransaksi->getResult() as $transaksi) {
                
                $confirm_teks = 'Apakah ingin menghapus data ini ? ('.$transaksi->id.')';
                $delete = "<a style='color:#6c757d;font-weight:bold' href=".base_url('transaksi/deleteDetail/'.$transaksi->id.'/'.$transaksi->id_transaksi)." onclick=\"javascript:return confirm('$confirm_teks')\">Delete</a>";
                
                $data[$x]['nama_barang'] = $transaksi->nama_barang;
                $data[$x]['jumlah']      = $transaksi->jumlah;
                $data[$x]['harga']       = number_format($transaksi->harga, 2, ",", ".");
                $data[$x]['total']       = number_format($transaksi->total, 2, ",", ".");
                $data[$x]['action']      = "<div style='text-align: center;'>".$delete."</div>";
                
                $x++;
            }
            
            echo json_encode(array("data"=>$data));
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Delete
     *
     * @param mixed $id           id
     * @param mixed $id_transaksi id_transaksi
     *
     * @return void
     */
    public function deleteDetail($id="", $id_transaksi="")
    {
        if (session()->get('id_user_level')=='1') {
            if ($id=="") {
                session()->setFlashdata('error', 'ID tidak ada');
                return redirect()->to('transaksi');
            } else {
                $transaksi = new TransaksiModel;
                if ($transaksi->deleteTransaksiDetail($id)) {
                    
                    $data=array();
                    $data['jumlah']     = $transaksi->getSumTransaksi('jumlah', $id_transaksi);
                    $data['harga']      = $transaksi->getSumTransaksi('harga', $id_transaksi);
                    $data['total']      = $transaksi->getSumTransaksi('total', $id_transaksi);
                    $data['updated_at'] = date('Y:m:d H:i:s');
                    $data['updated_by'] = session()->get('username');
                
                    $transaksi->editTransaksi($id_transaksi, $data);

                    session()->setFlashdata('info', 'Data berhasil dihapus');
                    return redirect()->to("transaksi/edit/".$id_transaksi);
                } else {
                    session()->setFlashdata('error', 'Data gagal dihapus');
                    return redirect()->to('transaksi/edit/'.$id_transaksi);
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
}
