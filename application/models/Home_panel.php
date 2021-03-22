<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_panel extends CI_Model {

	public function __construct(){
		parent :: __construct();
		
	}
	
	public function post_data($limit,$offset)
	{   $this->db->select('*')
                 ->from('post')
                 ->limit($limit,$offset)
                 ->join('category','post.category=category.category_id')
                 ->join('user','post.author=user.user_id');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
		
	}
    public function sidebar_data(){
        $this->db->select('*')
                 ->order_by('post_id','DESC')
                 ->limit(5)
                 ->join('category','post.category=category.category_id')
                 ->join('user','post.author=user.user_id');
       $query = $this->db->get('post')->result_array();
       return $query;

    }

    public function getCategoryPost($cid){
        $this->db->select('*')
                 ->from('post')
                 ->limit(5)
                 ->where('category',$cid)
                 ->join('category','post.category=category.category_id')
                 ->join('user','post.author=user.user_id');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function getAuthPost($id){
        $this->db->select('*')
                 ->from('post')
                 ->where('author',$id)
                 ->join('category','post.category=category.category_id')
                 ->join('user','post.author=user.user_id');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    //-----------Search Data-------------//

    public function search_data($data){
        $this->db->select('*')
        ->from('post')
        ->limit(5)
        ->join('category','post.category=category.category_id')
        ->join('user','post.author=user.user_id')
        ->like('title',$data['search'])
        ->or_like('description',$data['search'])
        ->or_like('category_name',$data['search']);
        $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result_array();
        }
            else{
            return false;
        }
    }

    public function post_num_rows(){
        return $this->db->get('post')->num_rows();
    }

    public function insert_contact_data($data){
        return $this->db->insert('contact',$data);
    }

}
?>