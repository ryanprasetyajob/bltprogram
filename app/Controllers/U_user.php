<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller u_user
 * @created on : Saturday, 28-Nov-2020 20:03:02
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * @editor Jovin <hijovin@gmail.com>
 * Copyright 2020
 */

class U_user extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('u_users');
    }
    

    /**
    * List all data u_user
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('u_user/index/'),
            'total_rows'        => $this->u_users->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['u_users']       = $this->u_users->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('u_user/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New u_user
    *
    */
    public function add() 
    {       
        $data['u_user'] = $this->u_users->add();
        $data['action']  = 'u_user/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_u_user").parsley();
                        });','embed');
      
        $this->template->render('u_user/form',$data);
    }

    /**
    * Call Form to Modify u_user
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['u_user']      = $this->u_users->get_one($id);
            $data['action']       = 'u_user/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_u_user").parsley();
                                    });','embed');
            
            $this->template->render('u_user/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('u_user'));
        }
    }


    
    /**
    * Save & Update data  u_user
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'Username',
                        'label' => 'Username',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'Password',
                        'label' => 'Password',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'RoleID',
                        'label' => 'RoleID',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'IsDeleted',
                        'label' => 'IsDeleted',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'CreatedDate',
                        'label' => 'CreatedDate',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'CreatedBy',
                        'label' => 'CreatedBy',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'UpdatedDate',
                        'label' => 'UpdatedDate',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'UpdatedBy',
                        'label' => 'UpdatedBy',
                        'rules' => 'trim'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post()) 
                      {
                          
                          $this->u_users->save();
                          $this->session->set_flashdata('notify', notify('Data berhasil ditambahkan','success'));
                          redirect('u_user');
                      }
                  } 
                  else // If validation incorrect 
                  {
                      $this->add();
                  }
         }
         else // Update data if Form Edit send Post and ID available
         {               
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == TRUE) 
                {
                    if ($this->input->post()) 
                    {
                        $this->u_users->update($id);
                        $this->session->set_flashdata('notify', notify('Data berhasil diupdate','success'));
                        redirect('u_user');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Detail u_user
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {
            $data['u_user'] = $this->u_users->get_one($id);            
            $this->template->render('u_user/show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('u_user'));
        }
    }
    
    /**
    * Search u_user like ""
    *
    */   
    public function search()
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
            
            $this->session->set_userdata(
                        array('keyword' => $this->input->post('q',TRUE))
                    );
        }
        
         $config = array(
            'base_url'          => site_url('u_user/search/'),
            'total_rows'        => $this->u_users->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['u_users']       = $this->u_users->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('u_user/view',$data);
    }
    
    /**
    * Delete u_user by ID
    *
    */
    public function destroy($id) 
    {        
        // Agar tabel dengan ID 0 bisa terhapus
        if ($id>=0) 
        {
            $this->u_users->destroy($id);           
            $this->session->set_flashdata('notify', notify('Data berhasil dihapus','success'));
            redirect('u_user');
        }

    }
}
?>