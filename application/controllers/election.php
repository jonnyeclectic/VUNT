<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Election extends CI_Controller {
	
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
	
	//redirect if needed, otherwise display the user list
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
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the elections
			$this->data['elections'] = $this->ion_auth->elections();
			$this->_render_page('election/election_index', $this->data);
		}
	}
	
	function vote($election_id)
	{
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['election_id'] = $election_id;
		$this->data['candidates'] = $this->ion_auth->candidates($election_id);
		$this->data['election_name'] = $this->ion_auth->name_election($election_id);
		$this->data['voted'] = $this->ion_auth->voted($this->ion_auth->user()->row()->id, $election_id);
		$this->_render_page('election/voting_index', $this->data);
	}
	
	function vote_for($election_id, $candidate_id)
	{
		$this->ion_auth->vote($election_id, $candidate_id, $this->ion_auth->user()->row()->id);
		redirect('election/vote/'.$election_id, 'refresh');
	}
	
	function unvote_for($election_id, $candidate_id)
	{
		$this->ion_auth->unvote($election_id, $candidate_id, $this->ion_auth->user()->row()->id);
		redirect('election/vote/'.$election_id, 'refresh');
	}
	
	function _render_page($view, $data=null, $render=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $render);
		if (!$render) return $view_html;
	}
	
}