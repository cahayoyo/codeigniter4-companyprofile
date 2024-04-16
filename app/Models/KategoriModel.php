<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_product';
    protected $primaryKey = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['nama_kategori', 'slug_kategori'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'tanggal_input';
    protected $updatedField = 'tanggal_ubah';
}
