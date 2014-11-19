<?php
include 'application\controllers\auth.php';

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->view('auth/home');
	}
	
	public function index(){
		$this->data['title'] = "Home";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			Auth::create_user($this->data['title']);
		else {
			$user = $this->ion_auth->user()->row();
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$this->data['groups'] = $this->ion_auth->group($user->id)->row();
			$this->data['user']	 = $user;//this->ion_auth->get_users_groups($user->id)->result();
			
			//$this->load->view('auth/index');
			$this->_render_page('auth/account', $this->data);
		}
	}
	
	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}
	

}
