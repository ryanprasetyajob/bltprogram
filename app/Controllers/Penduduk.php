<?php namespace App\Controllers;

class Penduduk extends BaseController
{
	public function index()
	{
          $session = session();           
          if(!isset($_SESSION['logged_in'])){
          return redirect()->to(base_url('public/login'));
          }

                $db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery('Select * from m_penduduk'))
                {
                $query = $db->query("SELECT mp.*,mc.NamaKecamatan,mk.NamaKelurahan ,mr.NomorRW,mt.NomorRT 
					FROM `m_penduduk` mp 
					INNER JOIN m_kecamatan mc on mc.KecamatanID=mp.KecamatanID
					INNER JOIN m_kelurahan mk on mk.KelurahanID=mp.KelurahanID AND mk.KecamatanID=mp.KecamatanID
					INNER JOIN m_Rw mr on mr.RwID=mp.RwID AND mr.KelurahanID=mp.KelurahanID AND mr.KecamatanID=mp.KecamatanID 
					INNER JOIN m_Rt mt on mt.RtID=mp.RtID AND mt.RwID=mp.RwID AND mt.KelurahanID=mp.KelurahanID AND mt.KecamatanID=mp.KecamatanID
					where mp.VerifiedStatus=0");
                
                }
                else
                {
                        echo "Query failed!";
                }
              
                return view('Penduduk/index',['query'=>$query]);
	}

	public function VerifiedAction()
	{
          $session = session();           
          if(!isset($_SESSION['logged_in'])){
          return redirect()->to(base_url('public/login'));
          }

		  if($this->request->getVar('pilihPendudukID')){
                $CreatedDate = date('Y-m-d H:i:s');
				$CreatedBy =$_SESSION['Username'];
				$pilihPendudukID = $this->request->getVar('pilihPendudukID');
				//dd($pilihPendudukID);
				$db = db_connect();
				foreach($pilihPendudukID as $pendudukID) {
					//echo $pendudukID."<br/>";
					
					$UpdateVerified ="Update m_penduduk ";
					$UpdateVerified .="Set	";		
					
					$UpdateVerified .="	VerifiedStatus      ='1',";
					$UpdateVerified.="	UpdatedBy      ='".$CreatedBy ."',";
					$UpdateVerified.="	UpdatedDate    ='".$CreatedDate."'";
					$UpdateVerified.=" WHERE PendudukID ='".$pendudukID."';";
					//echo $stringQueryInsertPenduduk;
					$db->reconnect();
					$query = $db->query($UpdateVerified );
				}
                $db->close();
		  }
               return $this->index();
	}

}
