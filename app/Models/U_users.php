<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of u_user
 * @created on : Saturday, 28-Nov-2020 20:03:02
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2020    
 */
 
 
class U_users extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data u_user
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('u_user', $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    

    /**
     *  Count All u_user
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('u_user');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All u_user
    *
    *  @param limit   : Integer
    *  @param offset  : Integer
    *  @param keyword : mixed
    *
    *  @return array
    *
    */
    public function get_search($limit, $offset) 
    {
        $keyword = $this->session->userdata('keyword');
                
        $this->db->like('UserID', $keyword);  
                
        $this->db->like('Username', $keyword);  
                
        $this->db->like('Password', $keyword);  
                
        $this->db->like('CreatedBy', $keyword);  
                
        $this->db->like('UpdatedBy', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('u_user');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    
    
    /**
    * Search All u_user
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('u_user');        
                
        $this->db->like('UserID', $keyword);  
                
        $this->db->like('Username', $keyword);  
                
        $this->db->like('Password', $keyword);  
                
        $this->db->like('CreatedBy', $keyword);  
                
        $this->db->like('UpdatedBy', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One u_user
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('UserID', $id);
        $result = $this->db->get('u_user');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    /**
    *  Default form data u_user
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'Username' => '',
            
                'Password' => '',
            
                'RoleID' => '',
            
                'IsDeleted' => '',
            
                'CreatedDate' => '',
            
                'CreatedBy' => '',
            
                'UpdatedDate' => '',
            
                'UpdatedBy' => '',
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save() 
    {
        $data = array(
        
            'Username' => strip_tags($this->input->post('Username', TRUE)),
        
            'Password' => strip_tags($this->input->post('Password', TRUE)),
        
            'RoleID' => strip_tags($this->input->post('RoleID', TRUE)),
        
            'IsDeleted' => strip_tags($this->input->post('IsDeleted', TRUE)),
        
            'CreatedDate' => strip_tags($this->input->post('CreatedDate', TRUE)),
        
            'CreatedBy' => strip_tags($this->input->post('CreatedBy', TRUE)),
        
            'UpdatedDate' => strip_tags($this->input->post('UpdatedDate', TRUE)),
        
            'UpdatedBy' => strip_tags($this->input->post('UpdatedBy', TRUE)),
        
        );
        
        
        $this->db->insert('u_user', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id)
    {
        $data = array(
        
                'Username' => strip_tags($this->input->post('Username', TRUE)),
        
                'Password' => strip_tags($this->input->post('Password', TRUE)),
        
                'RoleID' => strip_tags($this->input->post('RoleID', TRUE)),
        
                'IsDeleted' => strip_tags($this->input->post('IsDeleted', TRUE)),
        
                'CreatedDate' => strip_tags($this->input->post('CreatedDate', TRUE)),
        
                'CreatedBy' => strip_tags($this->input->post('CreatedBy', TRUE)),
        
                'UpdatedDate' => strip_tags($this->input->post('UpdatedDate', TRUE)),
        
                'UpdatedBy' => strip_tags($this->input->post('UpdatedBy', TRUE)),
        
        );
        
        
        $this->db->where('UserID', $id);
        $this->db->update('u_user', $data);
    }


    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function destroy($id)
    {       
        $this->db->where('UserID', $id);
        $this->db->delete('u_user');
        
    }







    



}
