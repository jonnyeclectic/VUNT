<?php 
include 'application\controllers\auth.php';
include 'application\controllers\election.php';
// Unit Tests are held here.
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
		
		// Unit tests for new requirements
		$this->unit->run($this->ion_auth->get_emails(0), 'is_array', 'Emails Return Correctly');
		$this->unit->run($this->ion_auth->name_election(0), 'is_string', 'Elections Properly Named');
		$confirmation_test_get = $this->db->get('votes');
		foreach ($confirmation_test_get->result() as $row)
			$this->unit->run($row->confirmation, 'is_string', 'Confirmation Numbers Exist');
		
		echo $this->unit->report();
	}
}