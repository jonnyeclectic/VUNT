<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
<?php include 'design.css';?>
</style><link rel="stylesheet" href="design.css" type="text/css"><?php
class Election extends CI_Controller {
	
	function __construct()
	{
		// loads all libraries and constructs function
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->library('email');
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

	function chart()
	{
		$this->load->view('election/Live_Feed');	
	}
	
	// Shows a list for an election of who the user can vote for.
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
		$confirmation = $this->ion_auth->vote($election_id, $candidate_id, $this->ion_auth->user()->row()->id);
		redirect('election/receipt/'.$election_id.'/'.$candidate_id.'/'.$confirmation, 'refresh');
	}
	// Removes specific vote for a candidate in an election, so that someone else may be voted for.
	function unvote_for($election_id, $candidate_id)
	{
		$this->ion_auth->unvote($election_id, $candidate_id, $this->ion_auth->user()->row()->id);
		redirect('election/vote/'.$election_id, 'refresh');
	}
	// Produces voting receipt upon a successful vote.
	function receipt($election_id, $candidate_id, $confirmation)
	{
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['confirmation'] = $confirmation;
		$this->data['election'] = $this->ion_auth->name_election($election_id);
		$this->data['election_id'] = $election_id;
		$this->data['candidate'] = $this->ion_auth->name_user($candidate_id);
		$this->_render_page('election/receipt', $this->data);
	}
	
	function search()
	{

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('confirmation', $this->lang->line('election_name_label'),'required');

		if ($this->form_validation->run() == TRUE)
		{

			$query = $this->db->get('votes');
			$this->data['confirmation'] = $this->input->post('confirmation');
			foreach($query->result() as $row){
				if ($row->confirmation == $this->data['confirmation']){
					$this->data['candidate_id'] =	$row->candidate_id;
					$this->data['user_id'] = 		$row->user_id;
					$this->data['election_id'] = 	$row->election_id;
				}
			}
			
			$query = $this->db->get('users');
			foreach($query->result() as $row){
				if ($row->id == $this->data['user_id']){
					$this->data['user_id'] = $row->username;
				}
			}			
			
			$query = $this->db->get('candidates');
			foreach($query->result() as $row){
				if ($row->candidate_id == $this->data['candidate_id']){
					$this->data['candidate_id'] =	$row->user_id;
				}
			}
			
			$query = $this->db->get('users');
			foreach($query->result() as $row){
				if ($row->id == $this->data['candidate_id']){
					$this->data['candidate_id'] = 	$row->username;
				}
			}			
			
			$query = $this->db->get('elections');
			foreach($query->result() as $row){
				if ($row->election_id == $this->data['election_id']){
					$this->data['election_id'] = 	$row->name;
				}
			}							
			
			
			$this->_render_page('election/search_results', $this->data);
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['confirmation'] = array(
				'name'  => 'confirmation',
				'id'    => 'confirmation',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('confirmation'),
			);	
			
			$this->_render_page('election/search', $this->data);
		}
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

	// Remind users to vote for an election
	function remind($election_id)
	{
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$emails = $this->ion_auth->get_emails($election_id);
		$this->data['election'] = $this->ion_auth->name_election($election_id);
		$this->data['emails'] = $emails;
		$subject = 'Voting Reminder from VUNT';
		$message = 'This is just a reminder to vote in the '.$this->data['election'].' election on VUNT!';

		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'vuntmail@gmail.com';
        $config['smtp_pass']    = 'csce4444';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
		$this->email->initialize($config);

        $this->email->from('vuntmail@gmail.com', 'VUNT');
        $this->email->to($emails); 
        $this->email->subject($subject);
        $this->email->message($message);  

        if($this->email->send())
			echo 'SUCCESS<br>';

		$this->_render_page('election/remind', $this->data);
		//echo $this->email->print_debugger();
	}
	// Applies a certain user for candidacy
	function apply($user_id)
	{
		$this->ion_auth->apply_for_candidacy($user_id);
		redirect('home');
	}
	
	//edit a user
	function edit($election_id = FALSE)
	{
		
		$query = $this->db->field_data('colleges');
		if($query)
		{
    		$this->data['myDropdown'] = $query;
    		//$this->load->view('auth/dropdown', $this->data);
		}
		
		$this->data['title'] = "Edit";

		if (!$this->ion_auth->is_admin())
		{
			redirect('election', 'refresh');
		}
		if($election_id){
		$query = $this->db->get('elections');
		foreach($query->result() as $row){
			if ($row->election_id == $election_id){
				$this->data['election_id'] = 	$election_id;
				$this->data['name'] = 			$row->name;
				$this->data['description'] = 	$row->description;
				$this->data['college'] = 		$row->college;
				$this->data['start_time'] = 	$row->start_time;
				$this->data['end_time'] = 		$row->end_time;
			}
		}	}

		//validate form input
		$this->form_validation->set_rules('election_id', $this->lang->line('edit_user_validation_fname_label'));
		$this->form_validation->set_rules('name', $this->lang->line('edit_user_validation_lname_label'));
		$this->form_validation->set_rules('description', $this->lang->line('edit_user_validation_EUID_label'));
		$this->form_validation->set_rules('college', $this->lang->line('edit_user_validation_college_label'));
		$this->form_validation->set_rules('start_time', $this->lang->line('edit_user_validation_groups_label'));
		$this->form_validation->set_rules('end_time', $this->lang->line('edit_user_validation_groups_label'));
		
		if (isset($_POST) && !empty($_POST))
		{
			/*/ do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}/*/

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'election_id' 	=> $this->input->post('election_id'),
					'name'  		=> $this->input->post('name'),
					'description'   => $this->input->post('description'),
					'college'      	=> $this->input->post('college'),
					'start_time'    => $this->input->post('start_time'),
					'end_time'      => $this->input->post('end_time'),
				);			
				$this->db->get('elections');
				$this->db->where('election_id',$data['election_id']);
				$this->db->update('elections', $data);
								
				    if ($this->ion_auth->is_admin())
					{
						redirect('election', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
				
			}
		}

		//display the edit user form
		//$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['election_id'] = array(
			'name'  => 'election_id',
			'id'    => 'election_id',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('election_id', $this->data['election_id']),
		);
		$this->data['name'] = array(
			'name'  => 'name',
			'id'    => 'name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('name', $this->data['name']),
		);
		$this->data['description'] = array(
			'name'  => 'description',
			'id'    => 'description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('description', $this->data['description']),
		);
		$this->data['college'] = array(
			'name'  => 'college',
			'id'    => 'college',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('college', $this->data['college']),
		);
		$this->data['start_time'] = array(
			'name' => 'start_time',
			'id'   => 'start_time',
			'type' => 'text',
			'value' => $this->form_validation->set_value('start_time', $this->data['start_time']),
		);
		$this->data['end_time'] = array(
			'name' => 'end_time',
			'id'   => 'end_time',
			'type' => 'text',
			'value' => $this->form_validation->set_value('end_time', $this->data['end_time']),
		);
		
		$this->_render_page('election/edit', $this->data);
	}
	
	function _render_page($view, $data=null, $render=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $render);
		if (!$render) return $view_html;
	}
	
}