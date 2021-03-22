<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent :: __construct();
		$this->load->model('Home_panel','home');
		$this->load->model('Admin_model','admin');
		$this->load->library('form_validation');
		
	}
	
	public function index()
	{	
	}

	public function post($page=null){
		if($page==null){
			$page=1;
		}
		$limit =4;
		$offset = ($page-1)* $limit;
		$data['page'] = $page;
		$data['post'] = $this->home->post_data($limit,$offset);
		$data['total_rows'] =$this->home->post_num_rows();
		$data['active'] = 'home';
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	public function post_details($id){
		$data['postData']=$this->admin->post_data($id);
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$this->load->view('header',$data);
		$this->load->view('single',$data);
		$this->load->view('footer');
	}
	public function category($cid){
		$data['active'] = 'category';
		$data['catPost']=$this->home->getCategoryPost($cid);
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$this->load->view('header',$data);
		$this->load->view('category',$data);
		$this->load->view('footer');
	}

	public function search_news(){
		$data['search'] = $this->input->post('search');
		$data['searchData'] = $this->home->search_data($data);
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$this->load->view('header',$data);
		$this->load->view('search',$data);
		$this->load->view('footer');
	}

	public function author($id){

		$data['authData'] = $this->home->getAuthPost($id);
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$data['userData'] = $this->admin->users_data($id);
		$this->load->view('header',$data);
		$this->load->view('author',$data);
		$this->load->view('footer');
	}

	public function about(){
		$data['active'] = 'about';
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$this->load->view('header',$data);
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function contact(){
		$data['active'] = 'contact';
		$data['sidebar'] = $this->home->sidebar_data();
		$data['category']=$this->admin->category_data();
		$this->load->view('header',$data);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	
	public function insert_contact(){
		$data=$this->input->post();
		if($this->home->insert_contact_data($data)){
			$this->session->set_flashdata('message','<div class="alert alert-success">Message Send successfully</div>');
			redirect(base_url('contact'));
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger">Message Sending failed</div>');
			redirect(base_url('contact'));
		}
	}
}

?>
