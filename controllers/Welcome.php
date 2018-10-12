<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	public function index()
	{
		//$result['products']=$this->welcome_model->cart_data();
		$this->load->view('welcome_message');
	}
	function add()
	{
		$id = $this->uri->segment(3);
		//echo $id; exit;
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$row=$query->row();

		 $data = array(
	        'id'      => $id,
	        'qty'     => 1,
	        'price'   => $row->product_price,
	        'name'    => $row->product_name,
	        'options' => array('Size'=>$row->size,'Brand'=>$row->brand)
           );

$this->cart->insert($data);

redirect('welcome','refresh');
	}

	public function cart()
	{
		$this->load->view('cart');
	}

	public function register()
	{
		$this->load->view('register_view');
	}

	public function register_action()
	{
		// print_r($_POST);
		$this->form_validation->set_rules('username', 'Person Name', 'trim|required|regex_match[/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/]');
		$this->form_validation->set_rules('usermobile', 'Person Mobile', 'trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('useremail', 'Person Email', 'trim|required|valid_email|is_unique[project_users.	useremail]');
		$this->form_validation->set_rules('userpassword', 'Password', 'trim|required|alpha_numeric|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('usercpassword', 'Confirm Password', 'trim|required|matches[userpassword]');

		if ($this->form_validation->run() == FALSE){
			 echo validation_errors();
		}
		else{
			// echo "Ok";
			unset($_POST['usercpassword']);
			$_POST['userpassword'] = do_hash($_POST['userpassword']);
			// print_r($_POST);	

			
			if( $this->welcome_model->insert_record($_POST) )
			{
				echo "User Added";
			}

		}
	}

}
