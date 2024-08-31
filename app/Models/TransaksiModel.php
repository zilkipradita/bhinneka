<?php
/**
 * PHP Version 8.2.21
 *
 * @category TransaksiModel
 * @package  Transaksi
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * TransaksiModel class
 *
 * @category TransaksiModel
 * @package  Transaksi
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * GetTransaksi
     *
     * @return void
     */
    public function getTransaksi()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi');
        
        $builder->select('transaksi.*');
        $builder->orderBy('transaksi.id', 'DESC');
        
        return $query = $builder->get();
    }
        
    /**
     * GetEditTransaksi
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function getEditTransaksi($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi');
        
        $builder->select('transaksi.*');
        $builder->where('transaksi.id', $id);
        
        return $query = $builder->get();
    }
        
    /**
     * EditTransaksi
     *
     * @param mixed $id   id
     * @param mixed $data data
     *
     * @return void
     */
    public function editTransaksi($id, $data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi');
        $builder->where('transaksi.id', $id);
        
        return $builder->update($data);
    }
        
    /**
     * DeleteTransaksi
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function deleteTransaksi($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi');
        $builder->where('transaksi.id', $id);
        
        return $builder->delete();
    }
        
    /**
     * SaveTransaksi
     *
     * @param mixed $data data
     *
     * @return void
     */
    public function saveTransaksi($data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi');
          
        return $builder->insert($data);
    }

    /**
     * SaveTransaksiDetail
     *
     * @param mixed $data data
     *
     * @return void
     */
    public function saveTransaksiDetail($data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi_detail');
          
        return $builder->insert($data);
    }

        
    /**
     * GetSumTransaksi
     *
     * @param mixed $type type
     * @param mixed $id   id
     *
     * @return void
     */
    public function getSumTransaksi($type, $id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi_detail');
        
        if ($type=="jumlah") {
            $builder->select('sum(jumlah) as sum_detail');
        } elseif ($type=="harga") {
            $builder->select('sum(harga) as sum_detail');
        } elseif ($type=="total") {
            $builder->select('sum(total) as sum_detail');
        }
        
        $builder->where('transaksi_detail.id_transaksi', $id);
        $query = $builder->get();
        $data = $query->getRow();
        
        return $data->sum_detail;
    }

        
    /**
     * GetEditTransaksiDetail
     *
     * @param mixed $id     id
     * @param mixed $barang barang
     *
     * @return void
     */
    public function getEditTransaksiDetail($id, $barang)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi_detail');
        
        $builder->select('transaksi_detail.*');
        $builder->where('transaksi_detail.id_transaksi', $id);
        $builder->where('transaksi_detail.id_barang', $barang);
        
        return $query = $builder->get();
    }
    
    /**
     * GetBarangbyTransaksi
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function getBarangbyTransaksi($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi_detail');
        
        $builder->select('transaksi_detail.*, barang.nama as nama_barang');
        $builder->join('barang', 'barang.id = transaksi_detail.id_barang', 'inner');
        $builder->where('transaksi_detail.id_transaksi', $id);
        $builder->orderBy('transaksi_detail.id', 'ASC');
        
        return $query = $builder->get();
    }

    /**
     * DeleteTransaksiDetail
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function deleteTransaksiDetail($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('transaksi_detail');
        $builder->where('transaksi_detail.id', $id);
        
        return $builder->delete();
    }
}
