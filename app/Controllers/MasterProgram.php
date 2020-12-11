<?php namespace App\Controllers;

use App\Controllers\Register;
class MasterProgram extends BaseController
{
	 protected $registerController ;
	 public function __construct() 
        {
                //parent::__construct();   
                $this->registerController = model('App\Controllers\Register');
			    
        }
	public function index()
	{
          $session = session();           
          if(!isset($_SESSION['logged_in'])){
          return redirect()->to(base_url('public/login'));
          }
		  $dataKec = $this->registerController->getKecamatan();
		  $dataKel = $this->registerController->getKelurahan();

                $db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery('Select * from m_program'))
                {
                $query = $db->query("SELECT mp.* ,
					(Select count(tp.ProposalID) from t_proposal tp where tp.KecamatanID =mp.KecamatanID	AND tp.KelurahanID=mp.KelurahanID ) RTJoined,
					mc.NamaKecamatan, mk.NamaKelurahan

					FROM `m_program` mp 
					LEFT JOIN m_kecamatan mc on mc.KecamatanID = mp.KecamatanID AND mp.KabupatenKotaID='64'
					LEFT JOIN m_kelurahan mk on mk.KelurahanID = mp.KelurahanID and mk.KecamatanID = mp.KecamatanID 
					WHERE mp.IsDeleted=0");
                
                }
                else
                {
                        echo "Query failed!";
                }
               $data =[
			'title'=>'Master Program',			
			'dataKec'=>$dataKec,
			'dataKel'=>$dataKel,
			'query'=>$query,
			];

                return view('MasterProgram/index',['data'=>$data]);
	}
	
	
	public function getMappingKriteria(){	
				$ProgramID = $_GET['ProgramSelectID'];			
				$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from m_programkriteria "))
                {
					$query = $db->query("SELECT
						pk.ProgramID, 
						pk.KriteriaID, 
						pk.BobotPercent, 
						pk.IsDeleted, 
						pk.CreatedDate, 
						pk.CreatedBy, 
						pk.UpdatedDate, 
						pk.UpdatedBy ,
						mp.ProgramName,
						mk.NamaKriteria
						FROM m_programkriteria pk 
						LEFT JOIN m_program mp on mp.ProgramID= pk.ProgramID
						LEFT JOIN m_kriteria mk on mk.KriteriaID = pk.KriteriaID
						WHERE pk.IsDeleted=0='".$ProgramID."'");                
                }
                else
                {
                    echo "Query failed!";
                }
				//return $query;
			return json_encode($query->getResult());
              
	}
}
