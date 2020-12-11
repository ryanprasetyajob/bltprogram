<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PendudukModel;
class Register extends BaseController
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
          $dataKec = $this->getKecamatan();
		  $dataKel = $this->getKelurahan();
          
		  $data =[
			'title'=>'Register',			
			'dataKec'=>$dataKec,
			'dataKel'=>$dataKel
			];

		  return view('Register/index',['data'=>$data,]);
	}
	public function getKecamatan(){		
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_kecamatan "))
                {
					$query = $db->query("Select KecamatanID, NamaKecamatan from m_kecamatan where IsDeleted ='0'");                
                }
                else
                {
                    echo "Query failed!";
                }
				//dd($query);
				return $query;
              
	}
	public function getKecamatanByKabKotaID(){	
				$kabKotaSelectID = $_GET['kabKotaSelectID'];			
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_kecamatan "))
                {
					$query = $db->query("Select KecamatanID, NamaKecamatan from m_kecamatan where IsDeleted ='0' and KabupatenKotaID ='".$kabKotaSelectID."'");                
                }
                else
                {
                    echo "Query failed!";
                }
				//return $query;
			return json_encode($query->getResult());
              
	}
	public function getKelurahanByKecID(){
	
				$kecSelectID = $_GET['kecSelectID'];		
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_kelurahan "))
                {
					$query = $db->query("Select KelurahanID, NamaKelurahan, KecamatanID from m_kelurahan where IsDeleted ='0' AND KecamatanID='".$kecSelectID."'");                
                }
                else
                {
                    echo "Query failed!";
                }
				
				return json_encode($query->getResult());
              
	}
	public function getRwByKecKelID(){		
				$kecSelectID = $_GET['kecSelectID'];
				$kelSelectID = $_GET['kelSelectID'];
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_kelurahan "))
                {
					$query = $db->query("Select RwID, NomorRW, KecamatanID,KelurahanID from m_rw where IsDeleted ='0' AND KelurahanID='".$kelSelectID."' AND KecamatanID='".$kecSelectID."'");                
                }
                else
                {
                    echo "Query failed!";
                }
		        return json_encode($query->getResult());
              
	}
	public function getRtByKecKelRwID(){		
				$kecSelectID = $_GET['kecSelectID'];
				$kelSelectID = $_GET['kelSelectID'];
				$rwSelectID = $_GET['rwSelectID'];
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_kelurahan "))
                {
					$query = $db->query("Select RtID, NomorRt, KecamatanID, KelurahanID, RwID from m_rt where IsDeleted ='0' AND KelurahanID='".$kelSelectID."' AND KecamatanID='".$kecSelectID."' AND RwID='".$rwSelectID."'");                
                }
                else
                {
                    echo "Query failed!";
                }
		        return json_encode($query->getResult());
              
	}
	public function getKelurahan(){		
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_kelurahan "))
                {
					$query = $db->query("Select KelurahanID, NamaKelurahan, KecamatanID from m_kelurahan where IsDeleted ='0'");                
                }
                else
                {
                    echo "Query failed!";
                }
				return $query;
              
	}
	public function getGuidMySQL(){		
				$db = \Config\Database::connect();
                $db = db_connect(); 
				
				if ($db->simpleQuery("SELECT uuid() as NewID; "))
                {				
					$query = $db->query("SELECT uuid() as NewID; ");               
                }
                /* else
                {
                    return $this->createGUID();
                } */
				return $query->getFirstRow()->NewID;
              
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
	    $session = session();  
		$emailAddress = $this->request->getVar('inputEmail');
		$password = $this->request->getVar('inputPassword');
		//dd($this->request);
		$db = db_connect();
		
		//Mapping data user
		$userIDGuid =  $this->createGUID();		
		$now = date('Y-m-d H:i:s');
		$Username   = $emailAddress ;
		$Password =  md5($password);//password_hash($password, PASSWORD_BCRYPT);
		$RoleID = '1';
		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy = 'System Register';
		
		$stringQueryInsertUser =
		"INSERT INTO u_user 
		(
			UserID, Username, Password, RoleID, IsDeleted, CreatedDate, CreatedBy
		)
		VALUES (
		  '".$userIDGuid	."',
		  '".$Username  	."',
		  '".$Password   	."',
		  '".$RoleID     	."',
		  '".$IsDeleted  	."',
		  '".$CreatedDate	."',
		  '".$CreatedBy  	."'
		)
		";
		//echo $stringQueryInsertUser;
		$db->reconnect();
		$query = $db->query($stringQueryInsertUser );
		$db->close();
		
		//echo $this->request->getFile('inputFoto')->getName();
		
		//Mapping data penduduk
		$newFileNameFoto = $this->request->getFile('inputFoto')->getRandomName();
		$newFileNameScanKTP = $this->request->getFile('inputScanKTP')->getRandomName();
		//dd($this->request->getVar('inputTanggalLahir'));
		$PendudukID = $this->getGuidMySQL();
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
		/* $inputStatusKawin    =$this->request->getVar('inputStatusKawin');
		$inputPekerjaan      =$this->request->getVar('inputNamaPekerjaan');*/
		$inputKewarganegaraan=$this->request->getVar('inputKewarganegaraan'); 
		$inputScanKTP    =$newFileNameScanKTP;
		$inputFoto       =$newFileNameFoto;

		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy = 'System Register';
		
		
		//Query Insert data penduduk
		$stringQueryInsertPenduduk =
		"INSERT INTO m_penduduk 
		(
			PendudukID, NIK, UserID, NamaWarga, TempatLahir, TanggalLahir, Gender, GolDarah, Alamat, Agama, KecamatanID, KelurahanID, RwID, RtID,Kewarganegaraan, scanKTP, Foto, IsDeleted, CreatedBy,CreatedDate
		)
		VALUES (
		  '".$PendudukID		   ."',
		  '".$inputNIK  		   ."',
		  '".$inputUserID          ."',
		  '".$inputNamaWarga       ."',
		  '".$inputTempatLahir     ."',
		  '".$inputTanggalLahir    ."',
		  '".$inputGender          ."',
		  '".$inputGolDarah        ."',
		  '".$inputAlamat          ."',
		  '".$inputAgama           ."',
		  '".$inputKecamatanID     ."',
		  '".$inputKelurahanID     ."',
		  '".$inputRwID            ."',
		  '".$inputRtID            ."',
		  '".$inputKewarganegaraan ."',
		  '".$inputScanKTP     ."',
		  '".$inputFoto            ."',
		  '".$IsDeleted ."',
		  '".$CreatedBy."',
		  '".$CreatedDate."'
		)
		";
		//echo $stringQueryInsertPenduduk;
		$db->reconnect();
		$query = $db->query($stringQueryInsertPenduduk );
		//dd($stringQueryInsertPenduduk);
		//echo $newFileNameFoto.' dan '.$newFileNameScanKTP;
		$this->request->getFile('inputFoto')->move('D:/xampp/htdocs/bltprogram/Attachment/',$newFileNameFoto);
		$this->request->getFile('inputScanKTP')->move('D:/xampp/htdocs/bltprogram/Attachment/',$newFileNameScanKTP);
		
		
		
		$db->close();
		
		
		
		
		$ses_data = [
                        'Username'     => $emailAddress,
                        'Password'     => $Password ,                    
                        'logged_in'     => TRUE
                    ];
        $session->set($ses_data);
	     
		return redirect()->to(base_url('public/User/dashboard'));
	
	}
	public  function UpdateProfile()
	{   
	    $session = session();  
		$emailAddress = $this->request->getVar('inputUsername');
		
		$db = db_connect();
		
		
		$now = date('Y-m-d H:i:s');
		$Username   = $emailAddress ;
	
		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy =$emailAddress;
		
		if ($this->request->getFile('inputFoto')->isValid()){
			$newFileNameFoto = $this->request->getFile('inputFoto')->getRandomName();
			$inputFoto       =$newFileNameFoto;
			$queryUpdateFoto="Foto      ='".$inputFoto       ."',";
		}else 
		{
			$queryUpdateFoto="";
		}
		
		if ( $this->request->getFile('inputScanKTP')->isValid()){
			$newFileNameScanKTP = $this->request->getFile('inputScanKTP')->getRandomName();
			$inputScanKTP    =$newFileNameScanKTP;
			$queryUpdateScanKTP="ScanKTP      ='".$inputScanKTP       ."',";
		}
		else 
		{
			$queryUpdateScanKTP="";
		}
		
		
		//dd($this->request->getVar('inputTanggalLahir'));
		
		$inputNIK			 =$this->request->getVar('inputNIK');	
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
		$inputKewarganegaraan=$this->request->getVar('inputKewarganegaraan'); 
		$inputPendudukID=$this->request->getVar('inputPendudukID'); 
		$inputNamaPekerjaan      =$this->request->getVar('inputNamaPekerjaan');
		
		$inputKriteriaStatusKawinID    =$this->request->getVar('inputKriteriaStatusKawinID');
		$inputStatusKawinID    =$this->request->getVar('inputStatusKawinID');
		
		$inputKriteriaGajiID    =$this->request->getVar('inputKriteriaGajiID');
		$inputRentangGajiID      =$this->request->getVar('inputRentangGajiID');
		
		$inputKriteriaKendaraanID    =$this->request->getVar('inputKriteriaKendaraanID');
		$inputKendaraanID     =$this->request->getVar('inputKendaraanID');
		
		$inputKriteriaTypeRumahID    =$this->request->getVar('inputKriteriaTypeRumahID');
		$inputTypeRumahID    =$this->request->getVar('inputTypeRumahID');
		
		$inputStatusKriteriaHuniID    =$this->request->getVar('inputStatusKriteriaHuniID');
		$inputStatusHuniID    =$this->request->getVar('inputStatusHuniID');
		
		
		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy = 'System Register';
		
		
		//Query Insert data penduduk
		$stringQueryInsertPenduduk ="Update m_penduduk ";
		$stringQueryInsertPenduduk .="Set	";		
		$stringQueryInsertPenduduk .=$queryUpdateFoto." ".$queryUpdateScanKTP;
		$stringQueryInsertPenduduk .="	NIK            ='".$inputNIK  		   ."',	";		
		$stringQueryInsertPenduduk .="	NamaWarga      ='".$inputNamaWarga       ."',";
		$stringQueryInsertPenduduk .="	TempatLahir    ='".$inputTempatLahir     ."',";
		$stringQueryInsertPenduduk .="	TanggalLahir   ='".$inputTanggalLahir    ."',";
		$stringQueryInsertPenduduk .="	Gender         ='".$inputGender          ."',";
		$stringQueryInsertPenduduk .="	GolDarah       ='".$inputGolDarah        ."',";
		$stringQueryInsertPenduduk .="	Alamat         ='".$inputAlamat          ."',";
		$stringQueryInsertPenduduk .="	Agama          ='".$inputAgama           ."',";
		$stringQueryInsertPenduduk .="	KecamatanID    ='".$inputKecamatanID     ."',";
		$stringQueryInsertPenduduk .="	KelurahanID    ='".$inputKelurahanID     ."',";
		$stringQueryInsertPenduduk .="	RwID           ='".$inputRwID            ."',";
		$stringQueryInsertPenduduk .="	RtID           ='".$inputRtID            ."',";
		$stringQueryInsertPenduduk .="	Kewarganegaraan='".$inputKewarganegaraan ."',";	
		$stringQueryInsertPenduduk .="	Pekerjaan='".$inputNamaPekerjaan ."',";	
		$stringQueryInsertPenduduk .="	IsDeleted      ='".$IsDeleted ."',";
		$stringQueryInsertPenduduk .="	UpdatedBy      ='".$CreatedBy ."',";
		$stringQueryInsertPenduduk .="	UpdatedDate    ='".$CreatedDate."'";
		$stringQueryInsertPenduduk .=" WHERE PendudukID ='".$inputPendudukID."';";
		//echo $stringQueryInsertPenduduk;
		$db->reconnect();
		$query = $db->query($stringQueryInsertPenduduk );
		//dd($stringQueryInsertPenduduk);
		//echo $newFileNameFoto.' dan '.$newFileNameScanKTP;
	    if ($this->request->getFile('inputFoto')->isValid()){
		$this->request->getFile('inputFoto')->move('D:/xampp/htdocs/bltprogram/Attachment/',$newFileNameFoto);
		}
		if ($this->request->getFile('inputScanKTP')->isValid()){
			$this->request->getFile('inputScanKTP')->move('D:/xampp/htdocs/bltprogram/Attachment/',$newFileNameScanKTP);
		}
		
				//1				
			$DelKriteriaStatusKawin ="Delete from m_kriteriapenduduk where PendudukID ='".$inputPendudukID."' AND KriteriaID ='".$inputKriteriaStatusKawinID."';";
			$db->reconnect();
			$query = $db->query($DelKriteriaStatusKawin );
			
			$mergeKriteriaStatusKawin ="Insert Into m_kriteriapenduduk ";
			$mergeKriteriaStatusKawin .="
			(
				KriteriaPendudukID 	,PendudukID 	,KriteriaID 	,KriteriaPointID 	,PointName 	,PointValue 	,IsDeleted 	,CreatedDate 	,CreatedBy
			)";
			$mergeKriteriaStatusKawin .=" VALUES ";
			$mergeKriteriaStatusKawin .="(";
			$mergeKriteriaStatusKawin .="	'".$this->getGuidMySQL()."',	";
			$mergeKriteriaStatusKawin .="	'".$inputPendudukID ."',	";
			$mergeKriteriaStatusKawin .="	'".$inputKriteriaStatusKawinID ."',	";
			$mergeKriteriaStatusKawin .="	'".$inputStatusKawinID  		   ."',";
			$mergeKriteriaStatusKawin .="	(select PointName from m_KriteriaPoint where KriteriaPointID ='".$inputStatusKawinID."' ),	";
			$mergeKriteriaStatusKawin .="	(select PointValue from m_KriteriaPoint where KriteriaPointID ='".$inputStatusKawinID."' ),	";
			$mergeKriteriaStatusKawin .="	'0',	";
			$mergeKriteriaStatusKawin .="	'".$CreatedBy ."',	";
			$mergeKriteriaStatusKawin .="	'".$CreatedDate."'";
			$mergeKriteriaStatusKawin .=");";
		
		//dd($mergeKriteriaStatusKawin) ;
			$db->reconnect();
			$query = $db->query($mergeKriteriaStatusKawin );
		
		//2
		$DelKriteriaKriteriaGaji ="Delete from m_kriteriapenduduk where PendudukID ='".$inputPendudukID."' AND KriteriaID ='".$inputKriteriaGajiID."';";
			$db->reconnect();
			$query = $db->query($DelKriteriaKriteriaGaji );
			
			$mergeKriteriaRentangGaji="Insert Into m_kriteriapenduduk ";
			$mergeKriteriaRentangGaji .="
			(
				KriteriaPendudukID 	,PendudukID 	,KriteriaID 	,KriteriaPointID 	,PointName 	,PointValue 	,IsDeleted 	,CreatedDate 	,CreatedBy
			)";
			$mergeKriteriaRentangGaji .=" VALUES ";
			$mergeKriteriaRentangGaji .="(";
			$mergeKriteriaRentangGaji .="	'".$this->getGuidMySQL()."',	";
			$mergeKriteriaRentangGaji .="	'".$inputPendudukID ."',	";
			$mergeKriteriaRentangGaji .="	'".$inputKriteriaGajiID ."',	";
			$mergeKriteriaRentangGaji .="	'".$inputRentangGajiID  		   ."',";
			$mergeKriteriaRentangGaji .="	(select PointName from m_KriteriaPoint where KriteriaPointID ='".$inputRentangGajiID."' ),	";
			$mergeKriteriaRentangGaji .="	(select PointValue from m_KriteriaPoint where KriteriaPointID ='".$inputRentangGajiID."' ),	";
			$mergeKriteriaRentangGaji .="	'0',	";
			$mergeKriteriaRentangGaji .="	'".$CreatedBy ."',	";
			$mergeKriteriaRentangGaji .="	'".$CreatedDate."'";
			$mergeKriteriaRentangGaji .=");";
		
		//dd($mergeKriteriaRentangGaji) ;
			$db->reconnect();
			$query = $db->query($mergeKriteriaRentangGaji );
		
		//3
		$DelKriteriaKriteriaKendaraan ="Delete from m_kriteriapenduduk where PendudukID ='".$inputPendudukID."' AND KriteriaID ='".$inputKriteriaKendaraanID."';";
			$db->reconnect();
			$query = $db->query($DelKriteriaKriteriaKendaraan );
			
			$mergeKriteriaKendaraan="Insert Into m_kriteriapenduduk ";
			$mergeKriteriaKendaraan .="
			(
				KriteriaPendudukID 	,PendudukID 	,KriteriaID 	,KriteriaPointID 	,PointName 	,PointValue 	,IsDeleted 	,CreatedDate 	,CreatedBy
			)";
			$mergeKriteriaKendaraan.=" VALUES ";
			$mergeKriteriaKendaraan.="(";
			$mergeKriteriaKendaraan.="	'".$this->getGuidMySQL()."',	";
			$mergeKriteriaKendaraan.="	'".$inputPendudukID ."',	";
			$mergeKriteriaKendaraan.="	'".$inputKriteriaKendaraanID ."',	";
			$mergeKriteriaKendaraan.="	'".$inputKendaraanID  		   ."',";
			$mergeKriteriaKendaraan.="	(select PointName from m_KriteriaPoint where KriteriaPointID ='".$inputKendaraanID."' ),	";
			$mergeKriteriaKendaraan.="	(select PointValue from m_KriteriaPoint where KriteriaPointID ='".$inputKendaraanID."' ),	";
			$mergeKriteriaKendaraan.="	'0',	";
			$mergeKriteriaKendaraan.="	'".$CreatedBy ."',	";
			$mergeKriteriaKendaraan.="	'".$CreatedDate."'";
			$mergeKriteriaKendaraan.=");";
		
		//dd($mergeKriteriaKendaraan) ;
			$db->reconnect();
			$query = $db->query($mergeKriteriaKendaraan );
			
			//4
		$DelKriteriaTypeRumah ="Delete from m_kriteriapenduduk where PendudukID ='".$inputPendudukID."' AND KriteriaID ='".$inputKriteriaTypeRumahID."';";
			$db->reconnect();
			$query = $db->query($DelKriteriaTypeRumah );
			
			$mergeKriteriaTypeRumah="Insert Into m_kriteriapenduduk ";
			$mergeKriteriaTypeRumah .="
			(
				KriteriaPendudukID 	,PendudukID 	,KriteriaID 	,KriteriaPointID 	,PointName 	,PointValue 	,IsDeleted 	,CreatedDate 	,CreatedBy
			)";
			$mergeKriteriaTypeRumah.=" VALUES ";
			$mergeKriteriaTypeRumah.="(";
			$mergeKriteriaTypeRumah.="	'".$this->getGuidMySQL()."',	";
			$mergeKriteriaTypeRumah.="	'".$inputPendudukID ."',	";
			$mergeKriteriaTypeRumah.="	'".$inputKriteriaTypeRumahID ."',	";
			$mergeKriteriaTypeRumah.="	'".$inputTypeRumahID  		   ."',";
			$mergeKriteriaTypeRumah.="	(select PointName from m_KriteriaPoint where KriteriaPointID ='".$inputTypeRumahID."' ),	";
			$mergeKriteriaTypeRumah.="	(select PointValue from m_KriteriaPoint where KriteriaPointID ='".$inputTypeRumahID."' ),	";
			$mergeKriteriaTypeRumah.="	'0',	";
			$mergeKriteriaTypeRumah.="	'".$CreatedBy ."',	";
			$mergeKriteriaTypeRumah.="	'".$CreatedDate."'";
			$mergeKriteriaTypeRumah.=");";
		
		//dd($mergeKriteriaKendaraan) ;
			$db->reconnect();
			$query = $db->query($mergeKriteriaTypeRumah );
			
			//5
		$DelKriteriaStatusHuni ="Delete from m_kriteriapenduduk where PendudukID ='".$inputPendudukID."' AND KriteriaID ='".$inputStatusKriteriaHuniID."';";
			$db->reconnect();
			$query = $db->query($DelKriteriaStatusHuni );
			
			$mergeKriteriaStatusHuni="Insert Into m_kriteriapenduduk ";
			$mergeKriteriaStatusHuni .="
			(
				KriteriaPendudukID 	,PendudukID 	,KriteriaID 	,KriteriaPointID 	,PointName 	,PointValue 	,IsDeleted 	,CreatedDate 	,CreatedBy
			)";
			$mergeKriteriaStatusHuni.=" VALUES ";
			$mergeKriteriaStatusHuni.="(";
			$mergeKriteriaStatusHuni.="	'".$this->getGuidMySQL()."',	";
			$mergeKriteriaStatusHuni.="	'".$inputPendudukID ."',	";
			$mergeKriteriaStatusHuni.="	'".$inputStatusKriteriaHuniID ."',	";
			$mergeKriteriaStatusHuni.="	'".$inputStatusHuniID  		   ."',";
			$mergeKriteriaStatusHuni.="	(select PointName from m_KriteriaPoint where KriteriaPointID ='".$inputStatusHuniID."' ),	";
			$mergeKriteriaStatusHuni.="	(select PointValue from m_KriteriaPoint where KriteriaPointID ='".$inputStatusHuniID."' ),	";
			$mergeKriteriaStatusHuni.="	'0',	";
			$mergeKriteriaStatusHuni.="	'".$CreatedBy ."',	";
			$mergeKriteriaStatusHuni.="	'".$CreatedDate."'";
			$mergeKriteriaStatusHuni.=");";
		
		//dd($mergeKriteriaKendaraan) ;
			$db->reconnect();
			$query = $db->query($mergeKriteriaStatusHuni );
		
		$db->close();
			
		
	     //echo "<Script>alert('Data berhasil diupdate.'); </script>";
		return redirect()->to(base_url('public/User/dashboard'));
	
	}
	public  function ChangePassword()
	{   
	    $session = session();  
		$emailAddress = $this->request->getVar('inputEmail');
		$pass = $this->request->getVar('inputPassword');
		//dd($this->request);
		$db = db_connect();
		
		//Mapping data user
		$userIDGuid =  $this->createGUID();		
		$now = date('Y-m-d H:i:s');
		$Username   = $emailAddress ;
		$Password =  md5($pass);//password_hash($pass, PASSWORD_BCRYPT);
		$RoleID = '1';
		$IsDeleted = '0';
		$CreatedDate = $now;
		$CreatedBy = 'System Register';
		
		$stringQueryInsertUser =
		"Update u_user 
		set 
		Password='".$Password    	."',
		UpdatedDate='".$now   	."',
		UpdatedBy='".$emailAddress."'
		WHERE
		 Username='".$emailAddress."'
		 
		";
		//echo $stringQueryInsertUser;
		$db->reconnect();
		$query = $db->query($stringQueryInsertUser );
		$db->close();
		
		
		
		$ses_data = [
                        'Username'     => $emailAddress,
                        'Password'     => $Password ,                    
                        'logged_in'     => TRUE
                    ];
        $session->set($ses_data);
	     
		return redirect()->to(base_url('public/User/dashboard'));
	
	}
	//--------------------------------------------------------------------
    
}
