<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PendudukModel;
class RegisterBackup extends BaseController
{
        protected $userModel ;		
        protected $pendudukModel ;
		protected $customFunction ;
        public function __construct() 
        {
                //parent::__construct();   
                $this->userModel = model('App\Models\UserModel');
                $this->pendudukModel = model('App\Models\PendudukModel');
			    
        }
	public function index()
	{
          /* $session = session();           
          if(!isset($_SESSION['logged_in'])){
			 
          return redirect()->to(base_url('public/login'));
          } */
		   //echo "<script>alert('Silahkan Register, Input dengan data yang sebenarnya.');</script>";
          return view('Register/index');
	}
	function createGUID()
	{
		if (function_exists('com_create_guid'))
		{
			return com_create_guid();
		}
		else
		{
			mt_srand((double)microtime()*10000);
			//optional for php 4.2.0 and up.
			$set_charid = strtoupper(md5(uniqid(rand(), true)));
			$set_hyphen = chr(45);
			// "-"
			$set_uuid = chr(123)
			.substr($set_charid, 0, 8).$set_hyphen
			.substr($set_charid, 8, 4).$set_hyphen
			.substr($set_charid,12, 4).$set_hyphen
			.substr($set_charid,16, 4).$set_hyphen
			.substr($set_charid,20,12)
			.chr(125);
			// "}"
			//dd($set_uuid);
			return $set_uuid;
		}
	}
	
	public  function SimpanRegister()
	{
		$emailAddress = $this->request->getVar('inputEmail');
		$password = $this->request->getVar('inputPassword');
		//dd($this->request);
		$db = db_connect();
		
		//Query Insert User
		$reg = new Register();
		$userIDGuid =  $this->createGUID();
		$pQuery1 = $db->prepare(function($db)
		{
			return $db->table('u_user')
					   ->insert([	
							'UserID'   => 'a',
							'Username'   => 'b',
							'Password' => 'c',
							'RoleID' => 'd',
							'IsDeleted'=>'e',
							'CreatedDate'=>'f',
							'CreatedBy'=>'g'
					   ]);
		});

		$now = date('Y-m-d H:i:s');
		$Username   = $emailAddress ;
		$Password =  password_hash($password, PASSWORD_BCRYPT);
		$RoleID = '1';
		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy = 'System Register';

		// Run the Query
		$results = $pQuery1->execute($userIDGuid,$Username, $Password,$RoleID,$IsDeleted ,$CreatedDate,$CreatedBy);
		$pQuery1->close();
		
		//Query Insert data penduduk
		$pQuery2 = $db->prepare(function($db)
		{
			return $db->table('m_penduduk')
					   ->insert([		
							'PendudukID'=>'a',					   
							'NIK'=>'a',
							'UserID'=>'a',
							'NamaWarga'=>'a',
							'TempatLahir'=>'a',
							'TanggalLahir'=>'a',
							'Gender'=>'a',
							'GolDarah'=>'a',
							'Alamat'=>'a',
							'Agama'=>'a',
							'KecamatanID'=>'a',
							'KelurahanID'=>'a',
							'RwID'=>'a',
							'RtID'=>'a',
							'StatusKawin'=>'a',
							'Pekerjaan'=>'a',
							'Kewarganegaraan'=>'a',
							'TandaTangan'=>'a',
							'Foto'=>'a',
							'IsDeleted'=>'a',
							'CreatedDate'=>'a',
							'CreatedBy'=>'a'
					   ]);
		});

		//$now = new DateTime();
		$PendudukID = $this->createGUID();
		$inputNIK			 =$this->request->getVar('inputNIK');
		$inputUserID         =$userIDGuid;
		$inputNamaWarga      =$this->request->getVar('inputNamaWarga');
		$inputTempatLahir    =$this->request->getVar('inputTempatLahir');
		$inputTanggalLahir   =$this->request->getVar('inputTanggalLahir');
		$inputGender         =$this->request->getVar('inputGender');
		$inputGolDarah       =$this->request->getVar('inputGolDarah');
		$inputAlamat         =$this->request->getVar('inputAlamat');
		$inputAgama          =$this->request->getVar('inputAgama');
		$inputKecamatanID    =$this->request->getVar('inputKecamatanID');
		$inputKelurahanID    =$this->request->getVar('inputKelurahanID');
		$inputRwID           =$this->request->getVar('inputRwID');
		$inputRtID           =$this->request->getVar('inputRtID');
		$inputStatusKawin    =$this->request->getVar('inputStatusKawin');
		$inputPekerjaan      =$this->request->getVar('inputNamaPekerjaan');
		$inputKewarganegaraan=$this->request->getVar('inputKewarganegaraan');
		$inputTandaTangan    =$this->request->getFile('inputTandaTangan')->getName();
		$inputFoto           =$this->request->getFile('inputFoto')->getName();

		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy = 'System Register';

			// Run the Query
		$results = $pQuery2->execute(
		$PendudukID,
		$inputNIK  ,
		$inputUserID          ,
		$inputNamaWarga       ,
		$inputTempatLahir     ,
		$inputTanggalLahir    ,
		$inputGender          ,
		$inputGolDarah        ,
		$inputAlamat          ,
		$inputAgama           ,
		$inputKecamatanID     ,
		$inputKelurahanID     ,
		$inputRwID            ,
		$inputRtID            ,
		$inputStatusKawin     ,
		$inputPekerjaan       ,
		$inputKewarganegaraan ,
		$inputTandaTangan     ,
		$inputFoto            ,
		$IsDeleted ,
		$CreatedDate ,
		$CreatedBy
		);
		$pQuery2->close();
		$ses_data = [
                        'Username'       => $emailString,
                        'Password'     => $Password ,
                    
                        'logged_in'     => TRUE
                    ];
                    $session->set($ses_data);
					return redirect()->to(base_url('public/masterprogram'));
					//return redirect()->to(base_url('User/dashboard'));
		// return view('User/dashboard',['emailString'=>$emailString] );
	
	}
	//--------------------------------------------------------------------

}
