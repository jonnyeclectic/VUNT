<?php 
include 'application\controllers\auth.php';
// Home page, really serving more of a placeholder function, but displays many options.
class Tests extends CI_Controller {
	
	function __construct(){
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
	
	function index(){
		$this->unit->run($this->ion_auth->elections(), 'is_array', 'Elections Exist');
		echo $this->unit->report();
	}
}