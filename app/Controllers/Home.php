<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// $db = \Config\Database::connect();
		// $db = db_connect();
		// if ($db->simpleQuery('Select * from m_program'))
        // {
        //     $query = $db->query("Select * from m_program");
           
        // }
        // else
        // {
        //         echo "Query failed!";
        // }
		return view('Login/index');

	}

	//--------------------------------------------------------------------

}
