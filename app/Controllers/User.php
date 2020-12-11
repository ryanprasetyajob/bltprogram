<?php namespace App\Controllers;

//use App\Models\UserModel;
use App\Models\UserModel;
class User extends BaseController
{                 
        protected $userModel ;
		protected $RegisterController ;
        public function __construct() 
        {
                //parent::__construct();   
                $this->userModel = model('App\Models\UserModel');
				$this->RegisterController = model('App\Controllers\Register');
				$session = session();           
				  if(!isset($_SESSION['logged_in'])){
				  return redirect()->to(base_url('public/login'));
				}
        }
	public function index()
	{
               // $userModel = model('App\Models\UserModel');
               

                $config = array(
                        'base_url'          => site_url('User/index/'),
                        'total_rows'        => $this->userModel->countAll()
                        
                    );
                 
                                 
                $dataUser= $this->userModel->findAll();
                //dd($data);
                $data =[
                'title'=>'Master User',
                'datauser'=>$dataUser,
                'config'=>$config

                ];

                return view('User/newpage',$data);
        }
		public function notVerifiedPage()
	{
               // $userModel = model('App\Models\UserModel');
               

                $config = array(
                        'base_url'          => site_url('User/index/'),
                        'total_rows'        => $this->userModel->countAll()
                        
                    );
                 
                                 
                $dataUser= $this->userModel->findAll();
                //dd($data);
                $data =[
                'title'=>'Master User',
                'datauser'=>$dataUser,
                'config'=>$config

                ];

                return view('User/notVerifiedPage',$data);
        }
		public function ChangePassword()
		{
          $session = session();           
          if(!isset($_SESSION['logged_in'])){
          return redirect()->to(base_url('public/login'));
          }
					$row = $this->getUserID()->getFirstRow();
						//echo  $row;
					$db = db_connect();
					if ($db->simpleQuery('Select * from m_penduduk'))
					{
						$query = $db->query("Select * from m_penduduk where UserID='".$row->UserID."';" );				
						//$query = $db->query("Select * from m_penduduk where username='admin@gmail.com'" );										
					}
					else
					{
						echo "Query failed!";
					}              
					//echo $emailString;
					//dd($this->getUserByUserID());
					$userdata =$this->getUserByUserID()->getFirstRow();
					
					$query =[
					'query'=>$query ,
					'userdata'=>$userdata

					];
					
					return view('User/changePassword',$query);
                //return view('User/changePassword',$data);
        }
        public function create()
        {

               // $userModel = model('App\Models\UserModel');

               $config = array(
                'base_url'          => site_url('User/index/'),
                'total_rows'        => $this->userModel->countAll()
                
            );
         
                         
        $dataUser= $this->userModel->findAll();
        //dd($data);
        $data =[
        'title'=>'Master User',
        'datauser'=>$dataUser,
        'config'=>$config

        ];

        return view('User/Create',$data);
        }
		public function getUserByUserID()
		{
			//dd($_SESSION['Username']);
			//$emailString = $this->request->getVar('emailString');
					 //$db = \Config\Database::connect();
					$db = db_connect();
					if ($db->simpleQuery('Select * from u_user'))
					{
						$query = $db->query("Select * from u_user where UserName='".$_SESSION['Username']."';" );				
						//$query = $db->query("Select * from m_penduduk where username='admin@gmail.com'" );										
					}
					else
					{
						echo "Query failed!";
					}              
					
					return $query;
		}
		
		public function getUserID()
		{
			//dd($_SESSION['Username']);
			//$emailString = $this->request->getVar('emailString');
					 //$db = \Config\Database::connect();
					$db = db_connect();
					if ($db->simpleQuery('Select * from u_user'))
					{
						$query = $db->query("Select * from u_user where username='".$_SESSION['Username']."';" );				
						//$query = $db->query("Select * from m_penduduk where username='admin@gmail.com'" );										
					}
					else
					{
						echo "Query failed!";
					}              
					
					return $query;
		}
		public function getPendudukByUserID()
		{
					$dataUser=$this->getUserID()->getFirstRow();
					$db = db_connect();
					if ($db->simpleQuery('Select * from u_user'))
					{
						$query = $db->query("Select * from m_penduduk where UserID='".$dataUser->UserID."';" );										
					}
					else
					{
						echo "Query failed!";
					}              
					
					return $query;
		}
		public function cekVerifiedUser()
		{
			//dd($_SESSION['Username']);
			//$emailString = $this->request->getVar('emailString');
					 //$db = \Config\Database::connect();
					$db = db_connect();
					if ($db->simpleQuery('Select * from u_user'))
					{
						$query = $db->query("Select * from u_user where UserName='".$_SESSION['Username']."';" );				
						//$query = $db->query("Select * from m_penduduk where username='admin@gmail.com'" );										
					}
					else
					{
						echo "Query failed!";
					}              
					
					return $query;
		}
		public function dashboard()
		{
			$session = session();           
          if(!isset($_SESSION['logged_in'])){
          return redirect()->to(base_url('public/login'));
          }
						$row = $this->getUserID()->getFirstRow();
						//echo  $row;
					$db = db_connect();
					if ($db->simpleQuery('Select * from m_penduduk'))
					{
						$query = $db->query("SELECT mp.* ,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=1 and kp.PendudukID=mp.PendudukID) as PointKendaraanID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=2 and kp.PendudukID=mp.PendudukID) as PointPendapatanID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=3 and kp.PendudukID=mp.PendudukID) as PointStatusHunianID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=4 and kp.PendudukID=mp.PendudukID) as PointStatusPernikahanID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=5 and kp.PendudukID=mp.PendudukID) as PointTypeRumahID,

(select PointName from m_kriteriapenduduk kp  where kp.KriteriaID=1 and kp.PendudukID=mp.PendudukID) as PointKendaraanName,
(select PointName from m_kriteriapenduduk kp  where kp.KriteriaID=2 and kp.PendudukID=mp.PendudukID) as PointPendapatanName,
(select PointName from m_kriteriapenduduk kp  where kp.KriteriaID=3 and kp.PendudukID=mp.PendudukID) as PointStatusHunianName,
(select PointName from m_kriteriapenduduk kp  where kp.KriteriaID=4 and kp.PendudukID=mp.PendudukID) as PointStatusPernikahanName,
(select PointName from m_kriteriapenduduk kp  where kp.KriteriaID=5 and kp.PendudukID=mp.PendudukID) as PointTypeRumahName
FROM `m_penduduk` mp 

WHERE mp.userid='".$row->UserID."';" );				
						//$query = $db->query("Select * from m_penduduk where username='admin@gmail.com'" );										
					}
					else
					{
						echo "Query failed!";
					}              
					//echo $emailString;
					return view('User/dashboard',['query'=>$query]);
		}
         public function Profile()
		{
		  $session = session();           
          if(!isset($_SESSION['logged_in'])){
          return redirect()->to(base_url('public/login'));
          }
		  
					$Pend = $this->getPendudukByUserID()->getFirstRow();
					if($Pend->VerifiedStatus=='0')
					{
						return $this->notVerifiedPage();
						
					}
						$row = $this->getUserID()->getFirstRow();
						//echo  $row;
					$db = db_connect();
					if ($db->simpleQuery('Select * from m_penduduk'))
					{
						$query = $db->query("SELECT mp.* ,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=1 and kp.PendudukID=mp.PendudukID) as PointKendaraanID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=2 and kp.PendudukID=mp.PendudukID) as PointPendapatanID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=3 and kp.PendudukID=mp.PendudukID) as PointStatusHunianID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=4 and kp.PendudukID=mp.PendudukID) as PointStatusPernikahanID,
(select KriteriaPointID from m_kriteriapenduduk kp  where kp.KriteriaID=5 and kp.PendudukID=mp.PendudukID) as PointTypeRumahID
FROM `m_penduduk` mp 

WHERE mp.userid='".$row->UserID."';" );				
						//$query = $db->query("Select * from m_penduduk where username='admin@gmail.com'" );										
					}
					else
					{
						echo "Query failed!";
					}              
					$dataKec = $this->RegisterController->getKecamatan();
					$dataKel = $this->RegisterController->getKelurahan();
					$dataUser = $this->getUserID();
				   // dd ($dataUser);
					$data =[
					'title'=>'Register',			
					'dataKec'=>$dataKec,
					'dataKel'=>$dataKel,
					'query'=>$query,
					'dataUser'=>$dataUser
					];

		  //return view('Register/index',['data'=>$data,]);
					
					return view('User/Profile',['data'=>$data]);
		}
}
