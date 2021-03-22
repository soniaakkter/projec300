<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent :: __construct();
		$this->load->model('Admin_model','admin');
		$this->load->library('form_validation');
		$this->load->library('Pagination_bootstrap');
		
	}
	
	public function index()
	{
		if($this->session->userdata('username')){
			redirect(base_url('admin/post'));
		}
        $this->load->view('admin/index');
	}

	public function login(){
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$query =$this->admin->login_data($data);
		if($query !=false){
			$this->session->set_userdata($query);
			redirect(base_url('admin/post'));
		}else{
			$this->session->set_userdata('login_failed','Username or Password not matched.');
			redirect(base_url('admin'));
		}
	}

	public function post(){
		$data['postData'] = $this->admin->post_data();
		$sql = $this->db->get('post');
		$this->pagination_bootstrap->offset(5);
		$data['results'] = $this->pagination_bootstrap->config('admin/post',$sql);
		$data['active']='post';
		$this->load->view('admin/header',$data);
        $this->load->view('admin/post',$data);
        $this->load->view('admin/footer');
	}

	public function logout(){
		$this->session->unset_userdata('username');
		redirect(base_url('admin'));
	}

	public function add_post(){

		$data['category']=$this->admin->category_data();

		if($this->input->post('trigger') == 'add_post'){
			$this->form_validation->set_rules('post_title', 'post_title', 'min_length[5]');
			$this->form_validation->set_rules('postdesc', 'postdesc', 'min_length[5]');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('admin/header');
				$this->load->view('admin/add-post');
				$this->load->view('admin/footer');
			}else{

				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2040';
				$config['max_width'] = '1200';
				$config['max_height'] = '1000';
				$config['overwrite'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('fileToUpload')){
					$data = $this->upload->data();
					$post_img = $config['upload_path'].''.$data['file_name'];

					$post =array(
						'title'=>$this->input->post('post_title'),
						'description'=>$this->input->post('postdesc'),
						'category'=>$this->input->post('category'),
						'author'=>$this->session->userdata('user_id'),
						'post_img'=>$post_img,
					);
					
					if($this->admin->insert_post($post)){
						$this->session->set_flashdata('message','<div class="alert alert-success">Post added successfully</div>');
						redirect(base_url('admin/post'));
					}else{
						$this->session->set_flashdata('message','<div class="alert alert-danger">Post added failed</div>');
						redirect(base_url('admin/post'));
					}
				 }
				  else {
					$error =  $this->upload->display_errors();
					$this->session->set_flashdata('message','<div class="alert alert-danger">'.$error.'</div>');
					redirect(base_url('admin/add_post'));
				 }
				
			}
		}
		else{
			$this->load->view('admin/header');
			$this->load->view('admin/add-post',$data);
			$this->load->view('admin/footer');
		}
		
	}

	public function category(){
		$data['category']=$this->admin->category_data();
		$data['active']='category';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/category',$data);
		$this->load->view('admin/footer');
	}

	public function user(){
		$data['active']='user';
		$data['userData'] = $this->admin->users_data();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users',$data);
		$this->load->view('admin/footer');
	}

	public function add_user(){

		if($this->input->post('trigger') == 'add_user'){
			$this->form_validation->set_rules('role', 'role', 'required');
			$this->form_validation->set_rules('username', 'username', 'is_unique[user.username]');
			$this->form_validation->set_rules('password', 'password', 'min_length[5]');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('admin/header');
				$this->load->view('admin/add-user');
				$this->load->view('admin/footer');
			}else{
				$user =array(
					'first_name'=>$this->input->post('fname'),
					'last_name'=>$this->input->post('lname'),
					'username'=>$this->input->post('username'),
					'password'=>$this->session->userdata('password'),
					'role'=>$this->input->post('role'),
				);
				if($this->admin->insert_user($user)){
					$this->session->set_flashdata('message','<div class="alert alert-success">User added successfully</div>');
					redirect(base_url('admin/user'));
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger">User added Failed</div>');
					redirect(base_url('admin/add_user'));
				}
			}
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/add-user');
			$this->load->view('admin/footer');
		}
		
	}


	public function add_category(){

		if($this->input->post('trigger') == 'add_category'){

			$this->form_validation->set_rules('cat', 'cat', 'is_unique[category.category_name]');
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message','<div class="alert alert-danger">'.validation_errors().'</div>');
				redirect(base_url('admin/add_category'));
			}else{
				$cat =array(
					'category_name'=>$this->input->post('cat')
				);
				if($this->admin->insert_category($cat)){
					$this->session->set_flashdata('message','<div class="alert alert-success">Category added successfully</div>');
					redirect(base_url('admin/category'));
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger">Category added Failed</div>');
					redirect(base_url('admin/add_category'));
				}
			}
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/add-category');
			$this->load->view('admin/footer');
		}
		
	}

	public function delete_data(){
		$data['table'] = $this->uri->segment('3');
		$data['id'] = $this->uri->segment('4');
		// print_r($data);
		// exit();
		if($this->admin->delete_data($data)){
			$this->session->set_flashdata('message','<div class="alert alert-success">'.$data['table'].' deleted successfully</div>');
			redirect(base_url('admin/'.$data['table']));
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger">'.$data['table'].' deleted Failed</div>');
			redirect(base_url('admin/'.$data['table']));
		}
	}

	///-------------------Update Admin Data------------------///

	public function update_user(){

		$id = $this->uri->segment('3');
		$data['userData'] = $this->admin->users_data($id);

		if($this->input->post('trigger')=='update_user'){
			$this->form_validation->set_rules('role', 'role', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('admin/header');
				$this->load->view('admin/add-user');
				$this->load->view('admin/footer');
			}else{
				$user =array(
					'user_id'=>$this->input->post('user_id'),
					'first_name'=>$this->input->post('fname'),
					'last_name'=>$this->input->post('lname'),
					'username'=>$this->input->post('username'),
					'role'=>$this->input->post('role'),
				);
				if($this->admin->update_user($user)){
					$this->session->set_flashdata('message','<div class="alert alert-success">User Updated successfully</div>');
					redirect(base_url('admin/user'));
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger">User updated Failed</div>');
					redirect(base_url('admin/update_user/'.$user['user_id']));
				}
			}
		}else{
		$this->load->view('admin/header');
		$this->load->view('admin/update-user',$data);
		$this->load->view('admin/footer');
		}
	}

	public function update_category(){

		$id = $this->uri->segment('3');
		$data['category']=$this->admin->category_data($id);

		if($this->input->post('trigger')=='update_category'){
			$cat =array(
				'category_id'=>$this->input->post('cat_id'),
				'category_name'=>$this->input->post('cat_name'),
			);
			if($this->admin->update_category($cat)){
				$this->session->set_flashdata('message','<div class="alert alert-success">User Updated successfully</div>');
				redirect(base_url('admin/category'));
				
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger">User updated Failed</div>');
				redirect(base_url('admin/update_category/'.$cat['category_id']));
			}
		}else{
		$this->load->view('admin/header');
		$this->load->view('admin/update-category',$data);
		$this->load->view('admin/footer');
		}
	}

	public function update_post(){

		$id = $this->uri->segment('3');
		$data['postData'] = $this->admin->post_data($id);
		$data['category']=$this->admin->category_data();

		if($this->input->post('trigger') == 'update_post'){
			$this->form_validation->set_rules('post_title', 'post_title', 'min_length[5]');
			$this->form_validation->set_rules('postdesc', 'postdesc', 'min_length[5]');
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message','<div class="alert alert-danger">'.validation_errors().'</div>');
				redirect(base_url('admin/update_post/'.$this->input->post('post_id')));
			}
			else{

				if($_FILES['new-image']['name']!=''){
					$config['upload_path'] = './assets/images/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '2000';
					$config['max_width'] = '1024';
					$config['max_height'] = '768';
					$config['overwrite'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('new-image')){
						$data = $this->upload->data();
						$post_img = $config['upload_path'].''.$data['file_name'];
					}
					else {
						$error =  $this->upload->display_errors();
						$this->session->set_flashdata('message','<div class="alert alert-danger">'.$error.'</div>');
						redirect(base_url('admin/update_post/'.$this->input->post('post_id')));
					}
				}else{
					$post_img=$this->input->post('old-image');
				}

				$post =array(
					'post_id'=>$this->input->post('post_id'),
					'title'=>$this->input->post('post_title'),
					'description'=>$this->input->post('postdesc'),
					'category'=>$this->input->post('category'),
					'post_img'=>$post_img,
				);
				if($this->admin->update_post($post)){
					$this->session->set_flashdata('message','<div class="alert alert-success">Post updated successfully</div>');
					redirect(base_url('admin/post'));
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger">Post updated failed</div>');
					redirect(base_url('admin/update_post/'.$post['post_id']));
				}

				
			}
		}else{
		$this->load->view('admin/header');
		$this->load->view('admin/update-post',$data);
		$this->load->view('admin/footer');
		}
	}

	public function contact(){
		$data['active']='contact';
		$data['category']=$this->admin->category_data();
		$data['contact'] = $this->admin->getContact();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/contact',$data);
		$this->load->view('admin/footer');
	}



}

?>
