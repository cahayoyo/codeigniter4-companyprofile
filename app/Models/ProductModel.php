<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['slug_product', 'kategori_slug', 'nama_product', 'deskripsi', 'gambar_product',];

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
