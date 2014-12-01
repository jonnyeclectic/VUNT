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
				$this->chart();
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
			$add_vote = FALSE;?>
			
<dl style="width: 300px">
<dt>12 a.m.</dt>
<?php $count['0'] = $this->ion_auth->vote_info("0",$add_vote);?><dd><div id="data-one" class="bar" style="width: 80%"><?php echo $count['0']?></div></dd>
<dt>1 a.m.</dt>
<?php $count['1'] = $this->ion_auth->vote_info("1",$add_vote);?><dd><div id="data-one" class="bar" style="width: 80%"><?php echo $count['1']?></div></dd>
<dt>2 a.m.</dt>
<?php $count['2'] = $this->ion_auth->vote_info("2",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['2']?></div></dd>
<dt>3 a.m.</dt>
<?php $count['3'] = $this->ion_auth->vote_info("3",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['3']?></div></dd>
<dt>4 a.m.</dt>
<?php $count['4'] = $this->ion_auth->vote_info("4",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['4']?></div></dd>
<dt>5 a.m.</dt>
<?php $count['5'] = $this->ion_auth->vote_info("5",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['5']?></div></dd>
<dt>6 a.m.</dt>
<?php $count['6'] = $this->ion_auth->vote_info("6",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['6']?></div></dd>
<dt>7 a.m.</dt>
<?php $count['7'] = $this->ion_auth->vote_info("7",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['7']?></div></dd>
<dt>8 a.m.</dt>
<?php $count['8'] = $this->ion_auth->vote_info("8",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['8']?></div></dd>
<dt>9 a.m.</dt>
<?php $count['9'] = $this->ion_auth->vote_info("9",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['9']?></div></dd>
<dt>10 a.m.</dt>
<?php $count['10'] = $this->ion_auth->vote_info("10",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['10']?></div></dd>
<dt>11 a.m.</dt>
<?php $count['11'] = $this->ion_auth->vote_info("11",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['11']?></div></dd>
<dt>12 p.m.</dt>
<?php $count['12'] = $this->ion_auth->vote_info("12",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['12']?></div></dd>
<dt>1 p.m.</dt>
<?php $count['13'] = $this->ion_auth->vote_info("13",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['13']?></div></dd>
<dt>2 p.m.</dt>
<?php $count['14'] = $this->ion_auth->vote_info("14",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['14']?></div></dd>
<dt>3 p.m.</dt>
<?php $count['15'] = $this->ion_auth->vote_info("15",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['15']?></div></dd>
<dt>4 p.m.</dt>
<?php $count['16'] = $this->ion_auth->vote_info("16",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['16']?></div></dd>
<dt>5 p.m.</dt>
<?php $count['17'] = $this->ion_auth->vote_info("17",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['17']?></div></dd>
<dt>6 p.m.</dt>
<?php $count['18'] = $this->ion_auth->vote_info("18",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['18']?></div></dd>
<dt>7 p.m.</dt>
<?php $count['19'] = $this->ion_auth->vote_info("19",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['19']?></div></dd>
<dt>8 p.m.</dt>
<?php $count['20'] = $this->ion_auth->vote_info("20",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['20']?></div></dd>
<dt>9 p.m.</dt>
<?php $count['21'] = $this->ion_auth->vote_info("21",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['21']?></div></dd>
<dt>10 p.m.</dt>
<?php $count['22'] = $this->ion_auth->vote_info("22",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['22']?></div></dd>
<dt>11 p.m.</dt>
<?php $count['23'] = $this->ion_auth->vote_info("23",$add_vote);?><dd><div id="data-two" class="bar" style="width: 80%"><?php echo $count['23']?></div></dd>
</dl>
<style type="text/css">
* { font-family: Helvetica, Arial; font-size: 12px;}

dt { float: left; padding: 4px; }

.bar {
margin-bottom: 10px;
color: #fff;
padding: 4px;
text-align: center;
background: -webkit-gradient(linear, left top, left bottom, from(#ff7617), to(#ba550f));
background-color: #ff7617;
-webkit-box-reflect: below 0 -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), to(rgba(0,0,0,0.25)));
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
-webkit-animation-name:bar;
-webkit-animation-duration:0.5s;
-webkit-animation-iteration-count:1;
-webkit-animation-timing-function:ease-out;
}

#data-one { -webkit-animation-name:bar-one; }
#data-two { -webkit-animation-name:bar-two; }
#data-three { -webkit-animation-name:bar-three; }
#data-four { -webkit-animation-name:bar-four; }

@-webkit-keyframes bar-one {
0% { width:0%; }
100% { width:60%; }
}

@-webkit-keyframes bar-two {
0% { width:0%; }
100% { width:80%; }
}

@-webkit-keyframes bar-three {
0% { width:0%; }
100% { width:64%; }
}

@-webkit-keyframes bar-four {
0% { width:0%; }
100% { width:97%; }
}
</style><?php		
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
	
	function _render_page($view, $data=null, $render=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $render);
		if (!$render) return $view_html;
	}
	
}