<?php 
include 'application\controllers\auth.php';
include 'application\controllers\election.php';?>
<style>
<?php include 'design.css';?>
</style><link rel="stylesheet" href="design.css" type="text/css"><?php
//application\controllers\election.php';
// Home page, really serving more of a placeholder function, but displays many options.
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
	// Gathers together all information and sends it to the view, so the user sees only certain 
	// options on the home page and their own specific data.
	public function index(){
		$this->data['title'] = "Home";
		if (!$this->ion_auth->logged_in()){
			Auth::create_user($this->data['title']);?>
			<dl style="width: 300px">
<dt>12 a.m.</dt>
<dd><div id="data-one" class="bar" style="width: 60%"><?php $count = $this->ion_auth->vote_info("0"); echo $count?></div></dd>
<dt>1 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("1"); echo $count?></div></dd>
<dt>2 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("2"); echo $count?></div></dd>
<dt>3 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("3"); echo $count?></div></dd>
<dt>4 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("4"); echo $count?></div></dd>
<dt>5 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("5"); echo $count?></div></dd>
<dt>6 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("6"); echo $count?></div></dd>
<dt>7 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("7"); echo $count?></div></dd>
<dt>8 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%"><?php $count = $this->ion_auth->vote_info("8"); echo $count?></div></dd>
<dt>9 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>10 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>11 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>12 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>1 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>2 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>3 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>4 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>5 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>6 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>7 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>8 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>9 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>10 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
<dt>11 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: 80%">80%</div></dd>
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
		else {
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['user']->groups = $this->ion_auth->get_users_groups($this->data['user']->id)->result();
			//list the users
			$this->data['is_admin'] = $this->ion_auth->is_admin($this->ion_auth->user()->row()->id);
			$this->data['is_pending'] = $this->ion_auth->is_pending($this->ion_auth->user()->row()->id);
			$this->data['is_candidate'] = $this->ion_auth->is_candidate($this->ion_auth->user()->row()->id);
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
