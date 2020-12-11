<?php namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table      = 'm_penduduk';
    protected $primaryKey = 'PendudukID';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    //protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = false;
    protected $createdField  = 'CreatedDate';
    protected $updatedField  = 'UpdatedDate';
    protected $deletedField  = 'UpdatedDate';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
