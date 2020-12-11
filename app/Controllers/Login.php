<?php namespace App\Controllers;

//use App\Models\UserModel;
use App\Models\UserModel;
class Login extends BaseController
{  
        protected $userModel ;
        public function __construct() 
        {
                //parent::__construct();   
                $this->userModel = model('App\Models\UserModel');

        }
	public function index()
	{
               // $userModel = model('App\Models\UserModel');
               session_start();
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

                return view('Login',$data);
        }
        public function auth()
        {
            
            $session = session();
            
            $username = $this->request->getVar('Username');
            $password = $this->request->getVar('Password');
            //dd( password_hash($password, PASSWORD_BCRYPT));
            //$data =$this->userModel->where('username', $username)->first();
			$db = \Config\Database::connect();
                $db = db_connect();
                if ($db->simpleQuery("Select * from u_user "))
                {
					$query = $db->query("Select Username,Password from u_user where Username='".$username."'");                
                }
                $data=$query->getFirstRow();
           //dd($data) ;
            if($data){
                $pass = $data->Password;
				$password=md5($password);
				
                //$verify_pass = password_verify($password, $pass);
              
                if($password==$pass)             
                {
                    $ses_data = [
                        'Username'       =>$data->Username,
                        'Password'     => $data->Password,
                    
                        'logged_in'     => TRUE
                    ];
                    $session->set($ses_data);
                   // $_SESSION["logged_in"] = TRUE;
                    return redirect()->to(base_url('public/User/dashboard'));
                }else{
					 
                    $session->setFlashdata('msg', 'Wrong Password');
                    return redirect()->to(base_url('public/login'));
                  
                }
            }else{
                $session->setFlashdata('msg', 'Email not Found');
                return redirect()->to(base_url('public/login'));
               // return view('Login');
            }
        }
     
        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect()->to(base_url('public/login'));
        }
    
}
