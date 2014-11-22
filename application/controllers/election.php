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
		else
		{
			if (!$this->ion_auth->is_admin())
			{
				$this->data['elections'] = $this->ion_auth->elections();
			}
			else 
			{
				$this->data['elections'] = $this->ion_auth->elections($this->ion_auth->user()->row()->college);	
			}
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the elections
			
			$i = 0;
			if(isset($this->data['elections']))
			foreach ($this->data['elections'] as $election)
			{
				if ($election['status'] === 'inactive')
					$this->data['winner'][$i] = $this->ion_auth->winner($election['id']);
				else
					$this->data['winner'][$i] = NULL;
				$i++;
			}
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
		$this->form_validation->set_rules('name', $this->lang->line('create_group_validation_name_label'),'required');
		$this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'),'required|xss_clean');
		$this->form_validation->set_rules('college', $this->lang->line('create_group_validation_desc_label'), 'xss_clean|required');
		$this->form_validation->set_rules('start_time', $this->lang->line('create_group_validation_desc_label'), 'xss_clean|required|exact_length[19]');
		$this->form_validation->set_rules('end_time', $this->lang->line('create_group_validation_desc_label'), 'xss_clean|required|exact_length[19]');

		if ($this->form_validation->run() == TRUE)
		{
			//$this->
			$new_election_id = $this->ion_auth->create_election($this->input->post('name'),$this->input->post('description'),$this->input->post('college'),$this->input->post('start_time'),$this->input->post('end_time'));
			//$new_election_id = $this->ion_auth->create_group($this->input->post('elections'), $this->input->post('description'));
			if($new_election_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
			}
			redirect("elections", 'refresh');
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
			/*$this->data['status'] = array( 
				'name'  => 'status',
				'id'    => 'status',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('status'),
			);*/
			
			$this->_render_page('election/create_election', $this->data);
		}
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