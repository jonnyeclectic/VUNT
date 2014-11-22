<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {
	
	function __construct()
	{
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
	
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect('home', 'refresh');
			//return show_error('You must be an administrator to view this page.');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['pending_users'] = $this->ion_auth->pending_users();
			$this->data['pending_candidates'] = $this->ion_auth->pending_candidates();

			$this->_render_page('application/application_index', $this->data);
		}
	}

	function validation_state($user_id, $switch)
	{
		if ($switch == 0)
			$this->ion_auth->delete_user($user_id);
		if ($switch == 1)
			$this->ion_auth->validate_user($user_id);
		redirect('application');
	}
	
	function candidacy_state($user_id, $switch)
	{
		$this->ion_auth->clear_candidacy_request($user_id);
		if ($switch == 1)
			$this->ion_auth->make_candidate($user_id);
		redirect('application');
	}

	function _render_page($view, $data=null, $render=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $render);
		if (!$render) return $view_html;
	}
}