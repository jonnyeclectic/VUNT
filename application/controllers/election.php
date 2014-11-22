<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Election extends CI_Controller {
	
	function __construct()
	{
		// loads all libraries and constructs function
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
		else
		{
			if ($this->ion_auth->is_admin())
			{
				// If an admin, view all elections.
				$this->data['elections'] = $this->ion_auth->elections();
			}
			else 
			{
				// If not an admin, only view elections that pertain to your colleges
				$this->data['elections'] = $this->ion_auth->elections(explode(',', $this->ion_auth->user()->row()->college));
			}
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the elections
			
			$i = 0;
			if(isset($this->data['elections']))
			foreach ($this->data['elections'] as $election)
			{
				if ($election['status'] === 'inactive')	// For all inactive elections, it's determined who the winner was.
					$this->data['winner'][$i] = $this->ion_auth->winner($election['id']);
				else
					$this->data['winner'][$i] = NULL;
				$this->data['is_candidates'][$election['id']] = $this->ion_auth->candidates($election['id']);
				$i++;
			}
			// Passes all necessary variables to the view, election_index, so that only certain types of users
			// see different things.
			$this->data['is_admin'] = $this->ion_auth->is_admin();
			$this->data['is_candidate'] = $this->ion_auth->is_candidate($this->ion_auth->user()->row()->id);
			$this->data['in_election'] = $this->ion_auth->in_election($this->ion_auth->user()->row()->id);
			$this->_render_page('election/election_index', $this->data);
		}
	}
	
	// Shows a list for an election of who the uer can vote for.
	function vote($election_id)
	{
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['election_id'] = $election_id;
		$this->data['candidates'] = $this->ion_auth->candidates($election_id);
		$this->data['election_name'] = $this->ion_auth->name_election($election_id);
		$this->data['voted'] = $this->ion_auth->voted($this->ion_auth->user()->row()->id, $election_id);
		$this->_render_page('election/voting_index', $this->data);
	}
	// Votes for a specific candidate once one is selected.
	function vote_for($election_id, $candidate_id)
	{
		$this->ion_auth->vote($election_id, $candidate_id, $this->ion_auth->user()->row()->id);
		redirect('election/vote/'.$election_id, 'refresh');
	}
	// Causes the current user to become a candidate in the election refered to by $election_id.
	function become_candidate($election_id)
	{
		$this->ion_auth->become_candidate($election_id, $this->ion_auth->user()->row()->id);
		redirect('election');
	}
	// Displays a page for election creation.
	function create_election()
	{
		$query = $this->db->field_data('colleges');
		if($query)
		{
    		$this->data['myDropdown'] = $query;
		}
		
		$this->data['title'] = $this->lang->line('election_create_label');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('name', $this->lang->line('election_name_label'),'required|is_unique[elections.name]');
		$this->form_validation->set_rules('description', $this->lang->line('election_desc_label'),'required|xss_clean');
		$this->form_validation->set_rules('start_time', $this->lang->line('election_start_time_label'), 'xss_clean|required|exact_length[19]');
		$this->form_validation->set_rules('end_time', $this->lang->line('election_end_time_label'), 'xss_clean|required|exact_length[19]');

		if ($this->form_validation->run() == TRUE)
		{

			$new_election_id = $this->ion_auth->create_election($this->input->post('name'),$this->input->post('description'),$this->input->post('college'),$this->input->post('start_time'),$this->input->post('end_time'));
			if($new_election_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
			}
			redirect("election", 'refresh');
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['name'] = array(
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('name'),
			);	
			$this->data['description'] = array( 
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);
			$this->data['college'] = array(
				'name'  => 'college',
				'id'    => 'college',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('college'),
			);		
			$this->data['start_time'] = array( 
				'name'  => 'start_time',
				'id'    => 'start_time',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('start_time'),
			);
			$this->data['end_time'] = array(
				'name'  => 'end_time',
				'id'    => 'end_time',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('end_time'),
			);
			
			$this->_render_page('election/create_election', $this->data);
		}
	}
	// Removes specific vote for a candidate in an election, so that someone else may be voted for.
	function unvote_for($election_id, $candidate_id)
	{
		$this->ion_auth->unvote($election_id, $candidate_id, $this->ion_auth->user()->row()->id);
		redirect('election/vote/'.$election_id, 'refresh');
	}
	// Applies a certain user for candidacy
	function apply($user_id)
	{
		$this->ion_auth->apply_for_candidacy($user_id);
		redirect('home');
	}
	
	function _render_page($view, $data=null, $render=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $render);
		if (!$render) return $view_html;
	}
	
}