<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct(){
		parent :: __construct();
		
	}

	public function login_data($data){
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
        $query = $this->db->get('user');
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }
	}

	public function post_data($id=null){

		if($id!=null){
			$this->db->select('*')
                 ->from('post')
				 ->where('post_id',$id)
                 ->join('category','post.category=category.category_id')
                 ->join('user','post.author=user.user_id');
			$query = $this->db->get();

			if($query->num_rows() >0){
				return $query->row_array();
			}
			else{
				return false;
			}
		}
		else{
			$this->db->select('*')
                 ->from('post')
                 ->join('category','post.category=category.category_id')
                 ->join('user','post.author=user.user_id');
			$query = $this->db->get();

			if($query->num_rows() >0){
				return $query->result_array();
			}
			else{
				return false;
			}
		}

	}

	public function category_data($id=null){

		if($id!=null){
			$this->db->where('category_id',$id);
			$query = $this->db->get('category');
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}
		else{
			$query = $this->db->get('category');
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
	}
	public function users_data($id=null){
		if($id!=null){
			$this->db->where('user_id',$id);
			$query = $this->db->get('user');
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}else{
			$query = $this->db->get('user');
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		
	}

	public function insert_user($user){
		return $this->db->insert('user',$user);
	}

	public function insert_category($cat){
		return $this->db->insert('category',$cat);
	}

	public function delete_data($data){
		$id = $data['table'].'_id';
		$this->db->where($id,$data['id']);
		return $this->db->delete($data['table']);
	}

	public function insert_post($post){
		return $this->db->insert('post',$post);
	}

	public function update_user($user){
		$this->db->where('user_id',$user['user_id']);
		return $this->db->update('user',$user);
	}

	public function update_category($cat){
		$this->db->where('category_id',$cat['category_id']);
		return $this->db->update('category',$cat);
	}

	public function update_post($post){
		$this->db->where('post_id',$post['post_id']);
		return $this->db->update('post',$post);
	}

	//---No of Post for categories ----------///

	public function getPostByCat($cat){
		$this->db->where('category',$cat);
		$query = $this->db->get('post');
		return $query->num_rows();
	}

	public function getContact(){
		$query = $this->db->get('contact');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}


}

?>