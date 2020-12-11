<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'u_user';
    protected $primaryKey = 'UserID';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = false;
    protected $createdField  = 'CreatedDate';
    protected $updatedField  = 'UpdatedDate';
    protected $deletedField  = 'UpdatedDate';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	
	public function CreateGUID()
	{
		return '1';
		
	}
}