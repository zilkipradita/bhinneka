<?php
/**
 * PHP Version 8.2.21
 *
 * @category BarangModel
 * @package  Master_Data
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * BarangModel class
 *
 * @category BarangModel
 * @package  Master_Data
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 *
 * @return void
 */
class BarangModel extends Model
{
    protected $table            = 'barang';
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
     * GetBarang
     *
     * @return void
     */
    public function getBarang()
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('barang');
        
        $builder->select('barang.*');
        $builder->orderBy('barang.id', 'ASC');
        
        return $query = $builder->get();
    }
        
    /**
     * GetEditBarang
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function getEditBarang($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('barang');
        
        $builder->select('barang.*');
        $builder->where('barang.id', $id);
        
        return $query = $builder->get();
    }
        
    /**
     * EditBarang
     *
     * @param mixed $id   id
     * @param mixed $data data
     *
     * @return void
     */
    public function editBarang($id, $data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('barang');
        $builder->where('barang.id', $id);
        
        return $builder->update($data);
    }
        
    /**
     * DeleteBarang
     *
     * @param mixed $id id
     *
     * @return void
     */
    public function deleteBarang($id)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('barang');
        $builder->where('barang.id', $id);
        
        return $builder->delete();
    }
        
    /**
     * SaveBarang
     *
     * @param mixed $data data
     *
     * @return void
     */
    public function saveBarang($data)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('barang');
          
        return $builder->insert($data);
    }
}
